<?php

class Percent
{
	public $absolute, $relative, $hundred, $nominal;

	public function __construct( $new, $unit)
	{
		$this->absolute = $new / $unit;
		$this->absolute = $this->formatNumber($this->absolute);
		
		$this->relative = $this->absolute - 1;
		$this->relative = $this->formatNumber($this->relative);
		
		$this->hundred = $this->absolute * 100;
		$this->hundred = $this->formatNumber($this->hundred);

		if ( $this->absolute > 1) 
		{
			$this->nominal = 'positive';
		}
		elseif ( $this->absolute == 1) 
		{
			$this->nominal = 'status quo';
		}
		else
		{
			$this->nominal = 'negative';
		}
	}

	private function formatNumber ( $number )
	{
		$formatted	=	number_format( $number, 2 );
		return $formatted;
	}

}

?>