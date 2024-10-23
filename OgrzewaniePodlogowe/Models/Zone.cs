namespace OgrzewanieWebObj.Models
{
    public class Zone
    {
        public byte sensorPin { get; set; }
        public byte relayPin { get; set; }
        public byte schedule { get; set; }
        public byte config { get; set; }
        public byte error { get; set; }
        public byte beginHour { get; set; }
        public byte beginMinute { get; set; }
        public byte endHour { get; set; }
        public byte endMinute { get; set; }
        public byte[] threshold { get; set; } = new byte[4];
        public byte[] deviceName { get; set; } = new byte[32];
    }
}
