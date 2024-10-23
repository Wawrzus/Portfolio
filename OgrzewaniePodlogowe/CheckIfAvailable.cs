using System.Net.NetworkInformation;

namespace OgrzewanieWebObj
{
    public static class CheckIfAvailable
    {
        public static bool deviceAvailable(string ipAddress)
        {
            Ping ping = new Ping();
            PingReply pingReply = ping.Send(ipAddress, 1000);
            string status = pingReply.Status.ToString();
            if(status.Equals("Success"))
                return true;
            else
                return false;
        }
    }
}
