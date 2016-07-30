<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/NicknamePokemonMessage.php');

namespace POGOProtos\Networking\Requests\Messages {

  use Protobuf;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Requests.Messages.NicknamePokemonMessage
  final class NicknamePokemonMessage extends ProtobufMessage {

    private $_unknown;
    private $pokemonId = 0; // optional fixed64 pokemon_id = 1
    private $nickname = ""; // optional string nickname = 2

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
          case 1: // optional fixed64 pokemon_id = 1
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_uint64($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_unint64 returned false');
            $this->pokemonId = $tmp;

            break;
          case 2: // optional string nickname = 2
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->nickname = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->pokemonId !== 0) {
        fwrite($fp, "\x09", 1);
        Protobuf::write_uint64($fp, $this->pokemonId);
      }
      if ($this->nickname !== "") {
        fwrite($fp, "\x12", 1);
        Protobuf::write_varint($fp, strlen($this->nickname));
        fwrite($fp, $this->nickname);
      }
    }

    public function size() {
      $size = 0;
      if ($this->pokemonId !== 0) {
        $size += 9;
      }
      if ($this->nickname !== "") {
        $l = strlen($this->nickname);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      return $size;
    }

    public function clearPokemonId() { $this->pokemonId = 0; }
    public function getPokemonId() { return $this->pokemonId;}
    public function setPokemonId($value) { $this->pokemonId = $value; }

    public function clearNickname() { $this->nickname = ""; }
    public function getNickname() { return $this->nickname;}
    public function setNickname($value) { $this->nickname = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('pokemon_id', $this->pokemonId, 0)
           . Protobuf::toString('nickname', $this->nickname, "");
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.NicknamePokemonMessage)
  }

}