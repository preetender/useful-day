<?php

namespace Preetender;

use Carbon\Carbon;


class UsefulDay
{
    /**
     * @var Carbon
     */
    private $date;

    /**
     * @var int
     */
    private $usefulDay;

    /**
     * @var Carbon
     */
    private $usefulDayDate;

    /**
     * UsefulDay constructor.
     * 
     * @param Carbon $carbon
     * @param int $usefulDay
     */
    private function __construct(Carbon $carbon, $usefulDay = 1)
    {
        $this->date = $carbon;
        $this->usefulDay = $usefulDay;
    }

    /**
     * @param \DateTimeInterface|Carbon|string $date
     * @param int $usefulDay
     * @return UsefulDay
     */
    public static function create($date, $usefulDay = 1) : UsefulDay
    {
        $carbonDate = null;

        if($date instanceof Carbon) $carbonDate = $date;

        if($date instanceof \DateTimeInterface) $carbonDate = Carbon::createFromTimestamp($date->getTimestamp());
        
        return (new self($carbonDate, $usefulDay))->calculate();
    }

    /**
     * Retornar data gerada.
     * 
     * @param string|null $format
     */
    public function getUsefulDayDate(string $format = null)
    {
        if(is_null($this->usefulDayDate)) throw new Exception('invalid date.');

        return is_null($format) ? $this->usefulDayDate : $this->usefulDayDate->format($format);
    }

    /**
     * Calcular com base no dia util informado no construtor.
     * 
     * @return Carbon
     */
    private function calculate()
    {
        $cursor = 0;

        for($i = 1; $i <= $this->date->daysInMonth; $i++) {

            if(Carbon::create($this->date->year, $this->date->month, $i)->isWeekend()) continue;

            $cursor++;

            if($cursor == $this->usefulDay) {
                //
                $this->usefulDayDate = Carbon::create($this->date->year, $this->date->month, $i);
            }
        }

        return $this;
    }
}
