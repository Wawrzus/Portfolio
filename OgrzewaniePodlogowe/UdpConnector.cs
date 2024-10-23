using System.Net.Sockets;
using System.Net;

namespace OgrzewanieWebObj
{
    public class UdpConnector
    {
        public static UdpClient udpClient { get; set; } = new UdpClient(6688);
        public static byte[] udpAsk(byte[] _toSend, string ipAddress)
        {
            IPEndPoint ipEndPoint = new IPEndPoint(IPAddress.Parse(ipAddress), 1200);
            byte[] toSend = _toSend;
            udpClient.Send(toSend, toSend.Length, ipEndPoint);
            byte[] received = udpClient.Receive(ref ipEndPoint);
            return Conversions.checkArrayLength(received);
        }
    }
}
