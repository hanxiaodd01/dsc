<?php
//多点乐资源
namespace OSS\Result;

class HeaderResult extends Result
{
    protected function parseDataFromResponse()
    {
        return empty($this->rawResponse->header) ? array() : $this->rawResponse->header;
    }
}
