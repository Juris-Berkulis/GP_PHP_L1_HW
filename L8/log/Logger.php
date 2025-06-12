<?php

class Logger
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function log(Exception | Error | Throwable $error)
    {
        $fullFileName = "L8/errors/$this->fileName.log";
        $date = new DateTime();
        $dateFormatted = $date->format('Y-m-d H:i:s');
        $errorCode = $error->getCode() ? $error->getCode() : 'нет';

        $logMessage = "$dateFormatted:\n";
        $logMessage .= "code: $errorCode; message: {$error->getMessage()}\n";
        $logMessage .= "file: {$error->getFile()}:{$error->getLine()}\n";
        $logMessage .= "trace: {$error->getTraceAsString()}\n";
        $logMessage .= "\n======================\n\n";

        file_put_contents($fullFileName, $logMessage, FILE_APPEND);
    }
}
