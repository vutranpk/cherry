using System;
using System.IO;
using System.Text;

class Program {
    static void Main() {
        string path = @"D:\antigravity\cherry3\cherry-theme\maintenance.php";
        string content = File.ReadAllText(path);

        // Remove the filter that makes the logo white
        content = content.Replace("filter: brightness(0) invert(1);", "");

        // Swap the background and text colors to light mode so the dark logo is visible
        content = content.Replace("--c-bg: #1a1a1a;", "--c-bg: #fffdfa;");
        content = content.Replace("--c-text: #ffffff;", "--c-text: #1a1a1a;");

        // Make the pill button border match the dark text
        content = content.Replace("border: 1px solid rgba(255,255,255,0.3);", "border: 1px solid rgba(0,0,0,0.2);");

        File.WriteAllText(path, content, Encoding.UTF8);
        Console.WriteLine("Maintenance page updated to light theme.");
    }
}
