<?php 

require_once(__DIR__ . '/mysql.php'); 

class Room {
    public $id;
    public $roomNumber;
    public $bedType;
    public $facilities;
    public $rate;
    public $offerPrice;
    public $status;
    public $description;
    public $photo;
    public $created_at;

  
    public function __construct($id, $roomNumber, $bedType, $facilities, $rate, $offerPrice, $status, $description, $photo, $created_at)
    {
        $this->id = $id;
        $this->roomNumber = $roomNumber;
        $this->bedType = $bedType;
        $this->facilities = $facilities;
        $this->rate = $rate;
        $this->offerPrice = $offerPrice;
        $this->status = $status;
        $this->description = $description;
        $this->photo = $photo;
        $this->created_at = $created_at;
    }

   
    public function getName()
    {
        return $this->bedType . ' Room #' . $this->roomNumber;
    }

    public static function loadFromDatabase()
    {
        $roomArray = MySQL::runFetchArrayQuery("SELECT * FROM rooms");
        $resultRoomArray = array();

        foreach ($roomArray as $room) {
            $roomResult = new Room(
                $room['id'], 
                $room['roomNumber'], 
                $room['bedType'], 
                $room['facilities'], 
                $room['rate'], 
                $room['offerPrice'], 
                $room['status'], 
                $room['description'], 
                $room['photo'], 
                $room['created_at']
            );

            array_push($resultRoomArray, $roomResult);
        }

        return $resultRoomArray;
    }
}
?>