using System.Text;

namespace OgrzewanieWebObj
{
    public static class Conversions
    {
        // Sprawdzenie czy przesłana wartość jest null
        public static string checkIfNotNull(string dataToCheck)
        {
            if (dataToCheck != null)
                return dataToCheck;
            else
                return "0";
        }

        // Konwersja z byte na float
        public static float byteToFloat(byte[] threshold)
        {
            float result = 0;
            result += (threshold[0]) << 0;
            result += (threshold[1]) << 8;
            result += (threshold[2]) << 16;
            result += (threshold[3]) << 24;
            return result;
        }

        // Konwersja z float na byte
        public static byte[] floatToByte(string threshold)
        {
            float fNumber = float.Parse(threshold, System.Globalization.CultureInfo.InvariantCulture);
            fNumber *= 1000.0f;
            int iNumber = (int)fNumber;
            byte[] byteArray = new byte[4];

            byteArray[0] = (byte)((iNumber >> 0) & 0xff);
            byteArray[1] = (byte)((iNumber >> 8) & 0xff);
            byteArray[2] = (byte)((iNumber >> 16) & 0xff);
            byteArray[3] = (byte)((iNumber >> 24) & 0xff);

            return byteArray;
        }

        public static byte[] checkArrayLength(byte[] data)
        {
            if (data.Length == 292)
            {
                return data;
            }
            else
            {
                byte[] empty = { 0, 0, 0, 0 };
                return data.Concat(empty).ToArray();
            }
        }

        // Konwersja dni tygodnia na byte
        // 1 - poniedziałek, 2 - wtorek, 4 - środa, 8 - czwartek
        // 16 - piątek, 32 - sobota, 64 - niedziela
        public static string daysToByteCode(string[] checkboxData)
        {
            int resultInt = 0;
            for (var i = 0; i < checkboxData.Length; i++)
            {
                resultInt += Int32.Parse(checkboxData[i]);
            }
            return resultInt.ToString();
        }

        public static string byteToName(byte[] data)
        {
            List<byte> list = new List<byte>();
            for (var i = 0; i < data.Length; i++)
            {
                if (data[i] != 0)
                {
                    list.Add(data[i]);
                }
                else
                {
                    break;
                }
            }
            return Encoding.UTF8.GetString(list.ToArray());
        }

        // Konwersja string na tablicę byte
        public static byte[] nameToByte(string name)
        {
            byte[] bName = Encoding.UTF8.GetBytes(name);
            byte[] toReturn = new byte[32];
            int index = 0;
            for (var i = 0; i < toReturn.Length; i++)
            {
                if (index < bName.Length)
                {
                    toReturn[i] = bName[i];
                    index++;
                }
                else
                {
                    toReturn[i] = 0;
                }
            }
            return toReturn;
        }

        // Konwersja z float na string
        public static string floatToString(float data)
        {
            return Math.Round(data * 0.001, 2, MidpointRounding.ToEven).ToString();
        }

        // Konwersja byte na dni tygodnia
        // 1 - poniedziałek, 2 - wtorek, 4 - środa, 8 - czwartek
        // 16 - piątek, 32 - sobota, 64 - niedziela
        public static string[] byteToDays(int day)
        {
            int index = 0;
            int[] possiblyByte = { 64, 32, 16, 8, 4, 2, 1 };
            List<int> byteList = new List<int>();
            List<string> strings = new List<string>();

            while (day != 0)
            {
                if (possiblyByte[index] > day)
                {
                    index++;
                }
                else
                {
                    byteList.Add(possiblyByte[index]);
                    day -= possiblyByte[index++];
                }
            }

            foreach (var item in byteList.ToArray())
            {
                switch (item)
                {
                    case 1:
                        strings.Add("pn");
                        break;
                    case 2:
                        strings.Add("wt");
                        break;
                    case 4:
                        strings.Add("sr");
                        break;
                    case 8:
                        strings.Add("cz");
                        break;
                    case 16:
                        strings.Add("pt");
                        break;
                    case 32:
                        strings.Add("sb");
                        break;
                    case 64:
                        strings.Add("nd");
                        break;
                }
            }

            return strings.ToArray();
        }

        // Konwersja byte na config
        // 1 - zawsze włączone, 2 - tylko pompa, 4 - wyłączone
        public static string[] byteToConfig(int day)
        {
            int index = 0;
            int[] possiblyByte = { 4, 2, 1 };
            List<int> byteList = new List<int>();
            List<string> strings = new List<string>();

            while (day != 0)
            {
                if (possiblyByte[index] > day)
                {
                    index++;
                }
                else
                {
                    byteList.Add(possiblyByte[index]);
                    day -= possiblyByte[index++];
                }
            }

            foreach (var item in byteList.ToArray())
            {
                switch (item)
                {
                    case 1:
                        strings.Add("zw");
                        break;
                    case 2:
                        strings.Add("tp");
                        break;
                    case 4:
                        strings.Add("wy");
                        break;
                }
            }

            return strings.ToArray();
        }

    }
}
