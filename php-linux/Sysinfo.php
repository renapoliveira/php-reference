<?php
/*
 *  TESTED:
 *          UBUNTU 14.04
 *          CENTOS 5.11
 *
 */
class Sysinfo
{
    private $whereis;
    private $apacheLog;
    private $apacheErrorLog;
    private $dnsFile;

    public function __construct()
    {
        $this->whereis = "/usr/bin/whereis";
        $this->apacheLog = "/var/log/apache2/access.log";
        $this->apacheErrorLog = "/var/log/apache2/error.log";
        $this->dnsFile = "/etc/resolv.conf";
    }

    private function checkCmd($command)
    {
        return (trim(shell_exec($this->whereis." ".$command." | awk '{print $2}'")) != "") ? true : false;
    }

    private function cmd($command, $param = "")
    {
        return ($this->checkCmd($command)) ? shell_exec($this->whereis." ".$command." | awk '{print $2 \" ".$param."\"}' | sh") : "";
    }

    public function getDiskSpace()
    {
        return $this->cmd("df", "-h");
    }

    public function getMemory()
    {
        return $this->cmd("free", "-m");
    }

    public function getNetworkInterface()
    {
        return $this->cmd("ifconfig");
    }

    public function getApacheLog($lines = 10)
    {
        return $this->cmd("tail", "-n ".$lines." ".$this->apacheLog);
    }

    public function getApacheErrorLog($lines = 10)
    {
        return $this->cmd("tail", "-n ".$lines." ".$this->apacheErrorLog);
    }

    public function getUname()
    {
        return $this->cmd("uname", "-a");
    }

    public function getHardware()
    {
        return $this->cmd("lshw", "-short");
    }

    public function getCpu()
    {
        return $this->cmd("lscpu");
    }

    public function getBlockDevices()
    {
        return $this->cmd("lsblk", "-a");
    }

    public function getUsb()
    {
        return $this->cmd("lsusb");
    }

    public function getPci()
    {
        return $this->cmd("lspci");
    }

    public function getLoggedUsers()
    {
        return $this->cmd("w");
    }

    public function getUsers()
    {
        return $this->cmd("cat", "/etc/passwd");
    }

    public function getDnsFile()
    {
        return $this->cmd("cat", $this->dnsFile);
    }

    public function getIptablesFilter()
    {
        return $this->cmd("iptables", "-t filter -L");
    }

    public function getIptablesMangle()
    {
        return $this->cmd("iptables", "-t mangle -L");
    }

    public function getIptablesNat()
    {
        return $this->cmd("iptables", "-t nat -L");
    }

}

