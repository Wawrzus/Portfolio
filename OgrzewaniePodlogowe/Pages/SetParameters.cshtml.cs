using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using OgrzewanieWebObj.Models;

namespace OgrzewanieWebObj.Pages
{
    public class SetParametersModel : PageModel
    {
        public void getReadings()
        {
            Driver.getReadings();
            for(var i = 0; i < 6; i++)
                ViewData[$"temp-{i}"] = Conversions.floatToString(Conversions.byteToFloat(Driver.readingList[i].temperature));
        }

        public void getParameters()
        {
            ViewData["checkIfAddress"] = 1;
            byte[] threshold = new byte[4];
            byte[] hysteresis = new byte[4];
            byte[] deviceName = new byte[32];
            byte schedule = 0; byte config = 0;
            Driver.getParameters();
            ViewData["packet"] = Driver.packet;
            ViewData["response"] = Driver.response;
            for (var i = 0; i < 4; i++)
                hysteresis[i] = Driver.hysteresis[i];
            ViewData[$"hysteresis"] = Conversions.floatToString(Conversions.byteToFloat(hysteresis));
            for (var i = 0; i < 4; i++)
                ViewData["scanInterval"] += $"{Driver.scanInterval[i].ToString()} ";
            for (var i = 0; i < 12; i++)
                ViewData["version"] += $"{Driver.version[i].ToString()} ";
            for (var i = 0; i < 6; i++)
            {
                ViewData[$"sensorPin-{i}"] = Driver.zoneList[i].sensorPin.ToString();
                ViewData[$"relayPin-{i}"] = Driver.zoneList[i].relayPin.ToString();

                schedule = Driver.zoneList[i].schedule;
                if (schedule == 0)
                    ViewData[$"schedule-{i}"] = schedule.ToString();
                else
                    foreach (var item in Conversions.byteToDays(schedule))
                        ViewData[$"schedule-{i}"] += $"{item}";

                config = Driver.zoneList[i].config;
                if (config == 0)
                    ViewData[$"config-{i}"] = config.ToString();
                else
                    foreach (var item in Conversions.byteToConfig(config))
                        ViewData[$"config-{i}"] += $"{item}";
                
                ViewData[$"error-{i}"] = Driver.zoneList[i].error.ToString();
                ViewData[$"beginTime-{i}"] = $"{Driver.zoneList[i].beginHour.ToString()}:{Driver.zoneList[i].beginMinute.ToString()}";
                ViewData[$"endTime-{i}"] = $"{Driver.zoneList[i].endHour.ToString()}:{Driver.zoneList[i].endMinute.ToString()}";
                ViewData[$"threshold-{i}"] = Conversions.floatToString(Conversions.byteToFloat(Driver.zoneList[i].threshold));
                ViewData[$"deviceName-{i}"] = Conversions.byteToName(Driver.zoneList[i].deviceName);
            }
        }

        public void setParameters()
        {
            byte frameType = 0x03;
            byte[] hysteresis = Conversions.floatToByte(Request.Form["hysteresis"]);
            byte[] scanInterval = { 59, 0, 0, 0 };
            byte[] arrayToSend = new byte[279];
            int counter = 0;
            arrayToSend[counter++] = frameType;
            for (var i = 0; i < 4; i++)
                arrayToSend[counter++] = hysteresis[i];
            for (var i = 0; i < 4; i++)
                arrayToSend[counter++] = scanInterval[i];
            for(var j = 0; j < 6; j++)
            {
                if (Request.Form[$"beginTime-{j}"] != "" && Request.Form[$"endTime-{j}"] != "")
                {
                    DateTime beginTime = DateTime.Parse(Request.Form[$"beginTime-{j}"]);
                    DateTime endTime = DateTime.Parse(Request.Form[$"endTime-{j}"]);

                    string[] daysName =
                    {
                        Conversions.checkIfNotNull(Request.Form[$"schedule-pn-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-wt-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-sr-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-cz-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-pt-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-sb-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"schedule-nd-{j}"]),
                    };

                    string[] configName =
                    {
                        Conversions.checkIfNotNull(Request.Form[$"config-zw-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"config-tp-{j}"]),
                        Conversions.checkIfNotNull(Request.Form[$"config-wy-{j}"])
                    };

                    byte sensorPin = (byte)j;
                    byte relayPin = (byte)Int32.Parse(Request.Form[$"relayPin-{j}"]);
                    byte schedule = (byte)Int32.Parse(Conversions.daysToByteCode(daysName));
                    byte config = (byte)Int32.Parse(Conversions.daysToByteCode(configName));
                    byte error = (byte)Int32.Parse("0");
                    byte beginHour = (byte)Int32.Parse(beginTime.Hour.ToString());
                    byte beginMinute = (byte)Int32.Parse(beginTime.Minute.ToString());
                    byte endHour = (byte)Int32.Parse(endTime.Hour.ToString());
                    byte endMinute = (byte)Int32.Parse(endTime.Minute.ToString());
                    byte[] threshold = Conversions.floatToByte(Request.Form[$"threshold-{j}"]);
                    byte[] deviceName = Conversions.nameToByte(Request.Form[$"deviceName-{j}"]);

                    arrayToSend[counter++] = sensorPin;
                    arrayToSend[counter++] = relayPin;
                    arrayToSend[counter++] = schedule;
                    arrayToSend[counter++] = config;
                    arrayToSend[counter++] = error;
                    arrayToSend[counter++] = beginHour;
                    arrayToSend[counter++] = beginMinute;
                    arrayToSend[counter++] = endHour;
                    arrayToSend[counter++] = endMinute;
                    for(var k = 0; k < 4; k++)
                        arrayToSend[counter++] = threshold[k];
                    for (var k = 0; k < 32; k++)
                        arrayToSend[counter++] = deviceName[k];
                }
            }
            Driver.saveParameters(arrayToSend);
        }

        public void OnGet()
        {
            ViewData["checkIfAddress"] = 0;
        }

        public void OnPostChangeIpAddress()
        {
            Driver.changeIp($"192.168.200.{Request.Form["deviceIp"]}");
            if(CheckIfAvailable.deviceAvailable($"192.168.200.{Request.Form["deviceIp"]}"))
            {
                ViewData["returnIp"] = Driver.getIpBack();
                getReadings();
                getParameters();
            }
            else
            {
                ViewData["checkIfAddress"] = 0;
            }
        }

        public void OnPostSaveOnDevice()
        {
            setParameters();
            getReadings();
            getParameters();
        }

        public void OnPostShowIp()
        {
            ViewData["returnIp"] = Driver.getIpBack();
            getReadings();
            getParameters();
        }
    }
}
