<?php
// Generated by https://github.com/bramp/protoc-gen-php// Please include protocolbuffers before this file, for example:
//   require('protocolbuffers.inc.php');
//   require('POGOProtos/Networking/Requests/Messages/FortDeployPokemonMessage.php');

namespace POGOProtos\Networking\Requests\Messages {

  use Protobuf;
  use ProtobufIO;
  use ProtobufMessage;

  // message POGOProtos.Networking.Requests.Messages.FortDeployPokemonMessage
  final class FortDeployPokemonMessage extends ProtobufMessage {

    private $_unknown;
    private $fortId = ""; // optional string fort_id = 1
    private $pokemonId = 0; // optional fixed64 pokemon_id = 2
    private $playerLatitude = 0; // optional double player_latitude = 3
    private $playerLongitude = 0; // optional double player_longitude = 4

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
          case 1: // optional string fort_id = 1
            if($wire !== 2) {
              throw new \Exception("Incorrect wire format for field $field, expected: 2 got: $wire");
            }
            $len = Protobuf::read_varint($fp, $limit);
            if ($len === false) throw new \Exception('Protobuf::read_varint returned false');
            $tmp = Protobuf::read_bytes($fp, $len, $limit);
            if ($tmp === false) throw new \Exception("read_bytes($len) returned false");
            $this->fortId = $tmp;

            break;
          case 2: // optional fixed64 pokemon_id = 2
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_uint64($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_unint64 returned false');
            $this->pokemonId = $tmp;

            break;
          case 3: // optional double player_latitude = 3
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_double($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_double returned false');
            $this->playerLatitude = $tmp;

            break;
          case 4: // optional double player_longitude = 4
            if($wire !== 1) {
              throw new \Exception("Incorrect wire format for field $field, expected: 1 got: $wire");
            }
            $tmp = Protobuf::read_double($fp, $limit);
            if ($tmp === false) throw new \Exception('Protobuf::read_double returned false');
            $this->playerLongitude = $tmp;

            break;
          default:
            $limit -= Protobuf::skip_field($fp, $wire);
        }
      }
    }

    public function write($fp) {
      if ($this->fortId !== "") {
        fwrite($fp, "\x0a", 1);
        Protobuf::write_varint($fp, strlen($this->fortId));
        fwrite($fp, $this->fortId);
      }
      if ($this->pokemonId !== 0) {
        fwrite($fp, "\x11", 1);
        Protobuf::write_uint64($fp, $this->pokemonId);
      }
      if ($this->playerLatitude !== 0) {
        fwrite($fp, "\x19", 1);
        Protobuf::write_double($fp, $this->playerLatitude);
      }
      if ($this->playerLongitude !== 0) {
        fwrite($fp, "!", 1);
        Protobuf::write_double($fp, $this->playerLongitude);
      }
    }

    public function size() {
      $size = 0;
      if ($this->fortId !== "") {
        $l = strlen($this->fortId);
        $size += 1 + Protobuf::size_varint($l) + $l;
      }
      if ($this->pokemonId !== 0) {
        $size += 9;
      }
      if ($this->playerLatitude !== 0) {
        $size += 9;
      }
      if ($this->playerLongitude !== 0) {
        $size += 9;
      }
      return $size;
    }

    public function clearFortId() { $this->fortId = ""; }
    public function getFortId() { return $this->fortId;}
    public function setFortId($value) { $this->fortId = $value; }

    public function clearPokemonId() { $this->pokemonId = 0; }
    public function getPokemonId() { return $this->pokemonId;}
    public function setPokemonId($value) { $this->pokemonId = $value; }

    public function clearPlayerLatitude() { $this->playerLatitude = 0; }
    public function getPlayerLatitude() { return $this->playerLatitude;}
    public function setPlayerLatitude($value) { $this->playerLatitude = $value; }

    public function clearPlayerLongitude() { $this->playerLongitude = 0; }
    public function getPlayerLongitude() { return $this->playerLongitude;}
    public function setPlayerLongitude($value) { $this->playerLongitude = $value; }

    public function __toString() {
      return ''
           . Protobuf::toString('fort_id', $this->fortId, "")
           . Protobuf::toString('pokemon_id', $this->pokemonId, 0)
           . Protobuf::toString('player_latitude', $this->playerLatitude, 0)
           . Protobuf::toString('player_longitude', $this->playerLongitude, 0);
    }

    // @@protoc_insertion_point(class_scope:POGOProtos.Networking.Requests.Messages.FortDeployPokemonMessage)
  }

}