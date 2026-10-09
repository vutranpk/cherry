using System;
using System.IO;
using System.Text;
using System.Text.RegularExpressions;

class Program {
    static void Main() {
        string path = @"D:\antigravity\cherry3\cherry-theme\functions.php";
        string content = File.ReadAllText(path);

        // Remove all occurrences of ?>
        content = content.Replace("?>", "");

        File.WriteAllText(path, content, Encoding.UTF8);
        Console.WriteLine("Removed closing PHP tags from functions.php");
    }
}
