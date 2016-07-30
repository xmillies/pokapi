<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Envelopes/AuthTicket.php');

namespace POGOProtos\Networking\Envelopes {

  use Protobuf;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Envelopes.AuthTicket
  final class AuthTicket extends ProtobufMessage {

    private $_unknown;
    private $start = ""; // optional bytes start = 1
    private $expireTimestampMs = 0; // optional uint64 expire_timestamp_ms = 2
    private $end = ""; // optional bytes end = 3

    public function __construct($in = null, &$limit = PHP_INT_MAX) {
      parent::__construct($in, $limit);
    }

    public function read($fp, &$limit = PHP_INT_MAX) {
      $fp = ProtobufIO::toStream($fp, $limit);
      while(!feof($fp) && $limit > 0) {
        $tag = Protobuf::read_varint($fp, $limit);
        if ($tag === false) break;
        $wire  = $tag & 0x07;
        $field = $tag >> 3;
        switch($field) {
          case 1: // optional bytes start = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->start = $tmp;

            break;
          case 2: // optional uint64 expire_timestamp_ms = 2
            if($wire !== 0) {
              throw new \Exception("Incorrect wire format for field $field, expected: 0 got: $wire");
            }
            $tmp = Protobuf::read_varint($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_varint returned false');
            if ($tmp < Protobuf::MIN_UINT64 || $tmp > Protobuf::MAX_UINT64) throw new \Exception('uint64 out of range');$this->expireTimestampMs = $tmp;

            break;
          case 3: // optional bytes end = 3
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->end = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->start !== "") {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, strlen($this->start));
        fwrite($fp, $this->start);
      }
      if ($this->expireTimestampMs !== 0) {
        fwrite($fp, "\x10", 1);
        Protobuf::write_varint($fp, $this->expireTimestampMs);
      }
      if ($this->end !== "") {
        fwrite($fp, "\x1a", 1);
        Protobuf::write_varint($fp, strlen($this->end));
        fwrite($fp, $this->end);
      }
    }

    public function size() {
      $size = 0;
      if ($this->start !== "") {
        $l = strlen($this->start);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->expireTimestampMs !== 0) {
        $size += 1 + Protobuf::size_varint($this->expireTimestampMs);
      }
      if ($this->end !== "") {
        $l = strlen($this->end);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearStart() { $this->start = ""; }
    public function getStart() { return $this->start;}
    public function setStart($value) { $this->start = $value; }

    public function clearExpireTimestampMs() { $this->expireTimestampMs = 0; }
    public function getExpireTimestampMs() { return $this->expireTimestampMs;}
    public function setExpireTimestampMs($value) { $this->expireTimestampMs = $value; }

    public function clearEnd() { $this->end = ""; }
    public function getEnd() { return $this->end;}
    public function setEnd($value) { $this->end = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('start', $this->start, "")
           . Protobuf::toString('expire_timestamp_ms', $this->expireTimestampMs, 0)
           . Protobuf::toString('end', $this->end, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Envelopes.AuthTicket)
  }

}