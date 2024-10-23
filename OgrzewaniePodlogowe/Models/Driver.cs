namespace OgrzewanieWebObj.Models
{
    public static class Driver
    {
        public static string ipAddress { get; set; }
        public static byte packet { get; set; }
        public static byte response { get; set; }
        public static byte[] hysteresis { get; set; } = new byte[4];
        public static byte[] scanInterval { get; set; } = new byte[4];
        public static byte[] version { get; set; } = new byte[12];
        public static List<Models.Zone> zoneList { get; set; } = new List<Zone>();
        public static byte year { get; set; }
        public static byte month { get; set; }
        public static byte day { get; set; }
        public static byte dayOfWeek { get; set; }
        public static byte hour { get; set; }
        public static byte minute { get; set; }
        public static byte second { get; set; }
        public static List<Models.Reading> readingList { get; set; } = new List<Reading>();

        static Driver()
        {
            for (var i = 0; i < 6; i++)
                zoneList.Add(new Zone());
            for (var i = 0; i < 6; i++)
                readingList.Add(new Reading());
        }

        public static void changeIp(string _ipAddress)
        {
            ipAddress = _ipAddress;
        }

        public static string getIpBack()
        {
            return ipAddress;
        }

        public static void getParameters()
        {
            byte[] answer = UdpConnector.udpAsk(new byte[] { 0x04 }, ipAddress);
            int dataCounter = 0;

            packet = answer[dataCounter++];
            response = answer[dataCounter++];
            for (var i = 0; i < 4; i++)
                hysteresis[i] = answer[dataCounter++];
            for (var i = 0; i < 4; i++)
                scanInterval[i] = answer[dataCounter++];
            for (var i = 0; i < 12; i++)
                version[i] = answer[dataCounter++];

            for (var i = 0; i < 6; i++)
            {
                zoneList[i].sensorPin = answer[dataCounter++];
                zoneList[i].relayPin = answer[dataCounter++];
                zoneList[i].schedule = answer[dataCounter++];
                zoneList[i].config = answer[dataCounter++];
                zoneList[i].error = answer[dataCounter++];
                zoneList[i].beginHour = answer[dataCounter++];
                zoneList[i].beginMinute = answer[dataCounter++];
                zoneList[i].endHour = answer[dataCounter++];
                zoneList[i].endMinute = answer[dataCounter++];
                for (var j = 0; j < 4; j++)
                    zoneList[i].threshold[j] = answer[dataCounter++];
                for (var j = 0; j < 32; j++)
                    zoneList[i].deviceName[j] = answer[dataCounter++];
            }
        }

        public static void saveParameters(byte[] arrayToSend)
        {
            byte[] answer = UdpConnector.udpAsk(arrayToSend, ipAddress);
        }

        public static void showParameters()
        {
            Console.Write($"{packet}\n");
            Console.Write($"{response}\n");
            foreach (var item in hysteresis)
                Console.Write($"{item} ");
            Console.Write($"\n");
            foreach (var item in scanInterval)
                Console.Write($"{item} ");
            Console.Write($"\n");
            foreach (var item in version)
                Console.Write($"{item} ");
            Console.Write($"\n");
            for (var i = 0; i < 6; i++)
            {
                Console.Write($"{zoneList[i].sensorPin}\n");
                Console.Write($"{zoneList[i].relayPin}\n");
                Console.Write($"{zoneList[i].schedule}\n");
                Console.Write($"{zoneList[i].config}\n");
                Console.Write($"{zoneList[i].error}\n");
                Console.Write($"{zoneList[i].beginHour}\n");
                Console.Write($"{zoneList[i].beginMinute}\n");
                Console.Write($"{zoneList[i].endHour}\n");
                Console.Write($"{zoneList[i].endMinute}\n");
                foreach (var item in zoneList[i].threshold)
                    Console.Write($"{item} ");
                Console.Write($"\n");
                foreach (var item in zoneList[i].deviceName)
                    Console.Write($"{item} ");
                Console.Write($"\n");
            }
        }

        public static void getReadings()
        {
            byte[] answer = UdpConnector.udpAsk(new byte[] { 0x01 }, ipAddress);
            int dataCounter = 0;

            packet = answer[dataCounter++];
            response = answer[dataCounter++];
            year = answer[dataCounter++];
            month = answer[dataCounter++];
            day = answer[dataCounter++];
            dayOfWeek = answer[dataCounter++];
            hour = answer[dataCounter++];
            minute = answer[dataCounter++];
            second = answer[dataCounter++];
            for (var i = 0; i < 6; i++)
            {
                for(var j = 0; j < 6; j++)
                {
                    readingList[i].temperature[j] = answer[dataCounter++];
                }
            }
        }
    }
}
