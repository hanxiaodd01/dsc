<?php
/*
 * Copyright 2007 ZXing authors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Zxing;


/**
 * <p>Encapsulates the result of decoding a barcode within an image.</p>
 *
 * @author Sean Owen
 */
final class Result
{

    private $text;
    private $rawBytes;
    private $resultPoints;
    private $format;
    private $resultMetadata;
    private $timestamp;


    public function __construct(
        $text,
        $rawBytes,
        $resultPoints,
        $format,
        $timestamp = ''
    ) {

        $this->text = $text;
        $this->rawBytes = $rawBytes;
        $this->resultPoints = $resultPoints;
        $this->format = $format;
        $this->resultMetadata = null;
        $this->timestamp = $timestamp ? $timestamp : time();
    }

    /**
     * @return raw text encoded by the barcode
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return raw bytes encoded by the barcode, if applicable, otherwise {@code null}
     */
    public function getRawBytes()
    {
        return $this->rawBytes;
    }

    /**
     * @return points related to the barcode in the image. These are typically points
     *         identifying finder patterns or the corners of the barcode. The exact meaning is
     *         specific to the type of barcode that was decoded.
     */
    public function getResultPoints()
    {
        return $this->resultPoints;
    }

    /**
     * @return {@link BarcodeFormat} representing the format of the barcode that was decoded
     */
    public function getBarcodeFormat()
    {
        return $this->format;
    }

    /**
     * @return {@link Map} mapping {@link ResultMetadataType} keys to values. May be
     *   {@code null}. This contains optional metadata about what was detected about the barcode,
     *   like orientation.
     */
    public function getResultMetadata()
    {
        return $this->resultMetadata;
    }

    public function putMetadata($type, $value)
    {
        if ($this->resultMetadata == null) {
            $this->resultMetadata = array();
        }
        $resultMetadata[$type] = $value;
    }

    public function putAllMetadata($metadata)
    {
        if ($metadata != null) {
            if ($this->resultMetadata == null) {
                $this->resultMetadata = $metadata;
            } else {
                $this->resultMetadata = array_merge($this->resultMetadata, $metadata);
            }
        }
    }

    public function addResultPoints($newPoints)
    {
        $oldPoints = $this->resultPoints;
        if ($oldPoints == null) {
            $this->resultPoints = $newPoints;
        } else {
            if ($newPoints != null && count($newPoints) > 0) {
                $allPoints = fill_array(0, count($oldPoints) + count($newPoints), 0);
                $allPoints = arraycopy($oldPoints, 0, $allPoints, 0, count($oldPoints));
                $allPoints = arraycopy($newPoints, 0, $allPoints, count($oldPoints), count($newPoints));
                $this->resultPoints = $allPoints;
            }
        }
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    //@Override
    public function toString()
    {
        return $this->text;
    }

}
