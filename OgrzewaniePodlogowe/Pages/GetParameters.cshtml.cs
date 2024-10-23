using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using OgrzewanieWebObj.Models;

namespace OgrzewanieWebObj.Pages
{
    public class GetParametersModel : PageModel
    {
        public void getParameters()
        {
            Driver.getParameters();
            ViewData["packet"] = Driver.packet;
            ViewData["response"] = Driver.response;
            for (var i = 0; i < 4; i++)
                ViewData["hysteresis"] += $"{Driver.hysteresis[i].ToString()} ";
            for (var i = 0; i < 4; i++)
                ViewData["scanInterval"] += $"{Driver.scanInterval[i].ToString()} ";
            for (var i = 0; i < 12; i++)
                ViewData["version"] += $"{Driver.version[i].ToString()} ";
            for (var i = 0; i < 6; i++)
            {
                ViewData[$"sensorPin{i}"] = Driver.zoneList[i].sensorPin.ToString();
                ViewData[$"relayPin{i}"] = Driver.zoneList[i].relayPin.ToString();
                ViewData[$"schedule{i}"] = Driver.zoneList[i].schedule.ToString();
                ViewData[$"config{i}"] = Driver.zoneList[i].config.ToString();
                ViewData[$"error{i}"] = Driver.zoneList[i].error.ToString();
                ViewData[$"beginTime{i}"] = $"{Driver.zoneList[i].beginHour.ToString()}:{Driver.zoneList[i].beginMinute.ToString()}";
                ViewData[$"endTime{i}"] = $"{Driver.zoneList[i].endHour.ToString()}:{Driver.zoneList[i].endMinute.ToString()}";
                for (var j = 0; j < 4; j++)
                    ViewData[$"threshold{i}"] += $"{Driver.zoneList[i].threshold[j].ToString()} ";
                for (var j = 0; j < 32; j++)
                    ViewData[$"deviceName{i}"] += $"{Driver.zoneList[i].deviceName[j].ToString()} ";
            }
        }

        public void OnGet()
        {
            Driver.changeIp($"192.168.200.216");
            getParameters();
        }

        public void OnPostChangeIpAddress() 
        {
            Driver.ipAddress = $"192.168.200.{Request.Form["deviceIp"]}";
            ViewData["returnIp"] = Driver.ipAddress;
            getParameters();
        }
    }
}
