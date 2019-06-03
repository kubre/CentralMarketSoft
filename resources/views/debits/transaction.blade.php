<!DOCTYPE html>
<html lang="mr">

<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style>
		.btn {
			font-size: 22px;
			font-family: sans-serif;
			text-decoration: none;
			padding: 7px 10px;
			margin: 10px 15px;
			color: #fff;
			background: #18f;
		}

		.btn-print {
			background: #1a8;
		}

		.no-print {
			margin-top: 20px;
		}

		@media print {
			.no-print {
				display: none;
			}
		}
	</style>
</head>

<body>

	<div class="no-print">
		<a class="btn btn-back" href="/debit/{{$transaction->debit->id}}">Go Back</a>
		<a class="btn btn-print" href="javascript:void(0)" onclick="window.print()">Print</a>
	</div>
	<div style="float:right;"> दुकान प्रत </div>
	<div style="width:100%">
		<h2 style="text-align:center"> {{ $transaction->shop()->shop_name }} </h2>
		<div style="text-align:center">
			दुकान पत्ता : <span>
				{{ $transaction->shop()->address->block_no }},
				{{ $transaction->shop()->address->village }},
				{{ $transaction->shop()->address->taluka }},
				{{ $transaction->shop()->address->city }},
				{{ $transaction->shop()->address->district }}
			</span>
		</div>
	</div>
	<div style="float:right;margin-right:20px;">
		पावती क्र. : <span> {{ $transaction->id }} </span>
	</div>
	<div style="margin:20px;">
		<div style="margin-bottom:20px;margin-top:30px;margin-left:20px;">
			ग्राहकाचे नाव : <span>
				{{ $transaction->debit->farmer->first_name }}
			</span>
		</div>
		<div style="margin:20px;">
			दिनांक : <span> {{ date("j/M/Y" ,strtotime($transaction->created_at)) }} </span>
		</div>
		<div style="margin:20px;">
			ग्राहक पत्ता :<span>
				{{ $transaction->debit->farmer->address->village }},
				{{ $transaction->debit->farmer->address->taluka }},
				{{ $transaction->debit->farmer->address->district }}
			</span>
		</div>
		<div style="margin:20px;">
			जमा रक्कम (रु.) : <span style="font-family: monospace"> {{ 
                    $transaction->created_at == $transaction->debit->created_at ? '0' : number_format( abs($amountPaid))
                    }} </span>
		</div>
		<div style="margin:20px;">
			टिप्पणी : <span> {{ $transaction->debit->comment }} </span>
		</div>
		<div style="margin:20px;">
			बाकी रक्कम (रु.) : <span style="font-family: monospace"> {{ number_format($transaction->debit->amount) }}
			</span>
		</div>
		<div style="margin-right:20px; margin-right:20px; float:right; font-weight:bold;">
			सही व शिक्का
		</div>
	</div>

	<!---- HR LINE---------------->
	<hr style="border-style:dashed; margin-top:150px;" />
	<!---- HR LINE---------------->

	<div style="float:right;"> ग्राहक प्रत </div>
	<div style="width:100%">
		<h2 style="text-align:center"> {{ $transaction->shop()->shop_name }} </h2>
		<div style="text-align:center">
			दुकान पत्ता : <span>
				{{ $transaction->shop()->address->block_no }},
				{{ $transaction->shop()->address->village }},
				{{ $transaction->shop()->address->taluka }},
				{{ $transaction->shop()->address->city }},
				{{ $transaction->shop()->address->district }}
			</span>
		</div>
	</div>
	<div style="float:right;margin-right:20px;">
		पावती क्र. : <span> {{ $transaction->id }} </span>
	</div>
	<div style="margin:20px;">
		<div style="margin-bottom:20px;margin-top:30px;margin-left:20px;">
			ग्राहकाचे नाव : <span>
				{{ $transaction->debit->farmer->first_name }}
			</span>
		</div>
		<div style="margin:20px;">
			दिनांक : <span> {{ date("j/M/Y" ,strtotime($transaction->created_at)) }} </span>
		</div>
		<div style="margin:20px;">
			ग्राहक पत्ता :<span>
				{{ $transaction->debit->farmer->address->village }},
				{{ $transaction->debit->farmer->address->taluka }},
				{{ $transaction->debit->farmer->address->district }}
			</span>
		</div>
		<div style="margin:20px;">
			जमा रक्कम (रु.) : <span style="font-family: monospace"> {{ 
                    $transaction->created_at == $transaction->debit->created_at ? '0' : number_format( abs($amountPaid))
                    }} </span>
		</div>
		<div style="margin:20px;">
			टिप्पणी : <span> {{ $transaction->debit->comment }} </span>
		</div>
		<div style="margin:20px;">
			बाकी रक्कम (रु.) : <span style="font-family: monospace"> {{ number_format($transaction->debit->amount) }}
			</span>
		</div>
		<div style="margin-right:20px; margin-right:20px; float:right; font-weight:bold;">
			सही व शिक्का
		</div>
	</div>

</body>

</html>