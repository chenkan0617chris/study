<?php

class Parking {
    public int $id;
    public string $username;
    public int $slot_id;
    public DateTime $start_time;
    public DateTime $end_time;
    public int $total_cost;
    public string $status;

    public function __construct($id, $username, $slot_id, $start_time, $end_time, $total_cost, $status) {
        $this->id = $id;
        $this->username = $username;
        $this->slot_id = $slot_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->total_cost = $total_cost;
        $this->status = $status;
    }

    public function get_total_cost(int $cost_per_hour) {
        $diff = $this->end_time->diff($this->start_time);

        $hours = $diff->h;

        $hours += $diff->days*24;

        return $cost_per_hour * $hours;
    }

}