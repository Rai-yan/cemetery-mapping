<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body id="background">
    <a class="btn btn-warning btn-sm" style="color: white" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>



    <h5 style="float: right; color: white; font-size: 20px">{{ Auth::user()->email }}</h5>

    <div class="container" style="margin-top: 50px">

    @if ( Auth::user()->role == 'admin')
    <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content"  >

                <!-- Begin Page Content -->
                <div class="container-fluid">
                @if(Session::has('success2'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success2')}}
                </div>
                @endif

                @if(Session::has('delete'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('delete')}}
                </div>
                @endif

                @if(Session::has('update'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('update')}}
                </div>
                @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <input type="hidden" value="{{ url()->full() }}" id="url">
                            <a href="/map" class="btn btn-primary" style="float: right" id="route">Request</a>
                            <h6 class="m-0 font-weight-bold text-primary" id="url_name">Person List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>User image</th> -->
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Middle name</th>
                                            <th>Grave no</th>
                                            <th>Date Acquired</th>
                                            <th>Block no</th>
                                            <th>Type of Lot</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>User image</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Grave no</th>
                                            <th>Born date</th>
                                            <th>Die date</th>
                                            <th>Block no</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        @foreach ($peoples as $people)
                                        <tr>
                                            <!-- <td><img src='{{ asset("storage/people/$people->user_image") }}' alt="" width="100"></td> -->
                                            <td>{{ $people->first_name }}</td>
                                            <td>{{ $people->last_name }}</td>
                                            <td>{{ $people->middle_name }}</td>
                                            <td>{{ $people->cemetery_no }}</td>
                                            <td>{!! date('M d, Y', strtotime($people->born_date)) !!}</td>
                                            <td>{{ $people->block_no }}</td>
                                            <td>{{ $people->type_of_lot }}</td>
                                            <td>
                                                <a onclick="edit({{ $people->id }})" class="btn btn-primary btn-icon-split btn-sm">
                                                <span class="text" style="color: white">Edit</span></a>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2020</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        @endif

       
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{Session::get('success')}} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="d-flex align-items-center" style="margin-top: 50px">
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box60" style="text-align: center" onclick="occupied(60)">60</div>
            <div id="box" class="box61" style="text-align: center" onclick="occupied(61)">61</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="box" class="box140" style="text-align: center" onclick="occupied(140)">140</div>
                <div id="box" class="box141" style="text-align: center" onclick="occupied(141)">141</div>
                <div id="box" class="box142" style="text-align: center" onclick="occupied(142)">142</div>
                <div id="box" class="box143" style="text-align: center" onclick="occupied(143)">143</div>
                <div id="box" class="box144" style="text-align: center" onclick="occupied(144)">144</div>
                <div id="box" class="box145" style="text-align: center" onclick="occupied(145)">145</div>
                <div id="box" class="box146" style="text-align: center" onclick="occupied(146)">146</div>
                <div id="box" class="box147" style="text-align: center" onclick="occupied(147)">147</div>
                <div id="box" class="box148" style="text-align: center" onclick="occupied(148)">148</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="box" class="box226" style="text-align: center" onclick="occupied(226)">226</div>
                <div id="box" class="box227" style="text-align: center" onclick="occupied(227)">227</div>
                <div id="box" class="box228" style="text-align: center" onclick="occupied(228)">228</div>
                <div id="box" class="box229" style="text-align: center" onclick="occupied(229)">229</div>
                <div id="box" class="box230" style="text-align: center" onclick="occupied(230)">230</div>
                <div id="box" class="box231" style="text-align: center" onclick="occupied(231)">231</div>
                <div id="box" class="box232" style="text-align: center" onclick="occupied(232)">232</div>
                <div id="box" class="box233" style="text-align: center" onclick="occupied(233)">233</div>
                <div id="box" class="box234" style="text-align: center" onclick="occupied(234)">234</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box56" style="text-align: center" onclick="occupied(56)">56</div>
            <div id="box" class="box57" style="text-align: center" onclick="occupied(57)">57</div>
            <div id="box" class="box58" style="text-align: center" onclick="occupied(58)">58</div>
            <div id="box" class="box59" style="text-align: center" onclick="occupied(59)">59</div>
            

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box129" style="text-align: center" onclick="occupied(129)">129</div>
                <div id="box" class="box130" style="text-align: center" onclick="occupied(130)">130</div>
                <div id="box" class="box131" style="text-align: center" onclick="occupied(131)">131</div>
                <div id="box" class="box132" style="text-align: center" onclick="occupied(132)">132</div>
                <div id="box" class="box133" style="text-align: center" onclick="occupied(133)">133</div>
                <div id="box" class="box134" style="text-align: center" onclick="occupied(134)">134</div>
                <div id="box" class="box135" style="text-align: center" onclick="occupied(135)">135</div>
                <div id="box" class="box136" style="text-align: center" onclick="occupied(136)">136</div>
                <div id="box" class="box137" style="text-align: center" onclick="occupied(137)">137</div>
                <div id="box" class="box138" style="text-align: center" onclick="occupied(138)">138</div>
                <div id="box" class="box139" style="text-align: center" onclick="occupied(139)">139</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box215" style="text-align: center" onclick="occupied(215)">215</div>
                <div id="box" class="box216" style="text-align: center" onclick="occupied(216)">216</div>
                <div id="box" class="box217" style="text-align: center" onclick="occupied(217)">217</div>
                <div id="box" class="box218" style="text-align: center" onclick="occupied(218)">218</div>
                <div id="box" class="box219" style="text-align: center" onclick="occupied(219)">219</div>
                <div id="box" class="box220" style="text-align: center" onclick="occupied(220)">220</div>
                <div id="box" class="box221" style="text-align: center" onclick="occupied(221)">221</div>
                <div id="box" class="box222" style="text-align: center" onclick="occupied(222)">222</div>
                <div id="box" class="box223" style="text-align: center" onclick="occupied(223)">223</div>
                <div id="box" class="box224" style="text-align: center" onclick="occupied(224)">224</div>
                <div id="box" class="box225" style="text-align: center" onclick="occupied(225)">225</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box50" style="text-align: center" onclick="occupied(50)">50</div>
            <div id="box" class="box51" style="text-align: center" onclick="occupied(51)">51</div>
            <div id="box" class="box52" style="text-align: center" onclick="occupied(52)">52</div>
            <div id="box" class="box53" style="text-align: center" onclick="occupied(53)">53</div>
            <div id="box" class="box54" style="text-align: center" onclick="occupied(54)">54</div>
            <div id="box" class="box55" style="text-align: center" onclick="occupied(55)">55</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box118" style="text-align: center" onclick="occupied(118)">118</div>
                <div id="box" class="box119" style="text-align: center" onclick="occupied(119)">119</div>
                <div id="box" class="box120" style="text-align: center" onclick="occupied(120)">120</div>
                <div id="box" class="box121" style="text-align: center" onclick="occupied(121)">121</div>
                <div id="box" class="box122" style="text-align: center" onclick="occupied(122)">122</div>
                <div id="box" class="box123" style="text-align: center" onclick="occupied(123)">123</div>
                <div id="box" class="box124" style="text-align: center" onclick="occupied(124)">124</div>
                <div id="box" class="box125" style="text-align: center" onclick="occupied(125)">125</div>
                <div id="box" class="box126" style="text-align: center" onclick="occupied(126)">126</div>
                <div id="box" class="box127" style="text-align: center" onclick="occupied(127)">127</div>
                <div id="box" class="box128" style="text-align: center" onclick="occupied(128)">128</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box204" style="text-align: center" onclick="occupied(204)">204</div>
                <div id="box" class="box205" style="text-align: center" onclick="occupied(205)">205</div>
                <div id="box" class="box206" style="text-align: center" onclick="occupied(206)">206</div>
                <div id="box" class="box207" style="text-align: center" onclick="occupied(207)">207</div>
                <div id="box" class="box208" style="text-align: center" onclick="occupied(208)">208</div>
                <div id="box" class="box209" style="text-align: center" onclick="occupied(209)">209</div>
                <div id="box" class="box210" style="text-align: center" onclick="occupied(210)">210</div>
                <div id="box" class="box211" style="text-align: center" onclick="occupied(211)">211</div>
                <div id="box" class="box212" style="text-align: center" onclick="occupied(212)">212</div>
                <div id="box" class="box213" style="text-align: center" onclick="occupied(213)">213</div>
                <div id="box" class="box214" style="text-align: center" onclick="occupied(214)">214</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box43" style="text-align: center" onclick="occupied(43)">43</div>
            <div id="box" class="box44" style="text-align: center" onclick="occupied(44)">44</div>
            <div id="box" class="box45" style="text-align: center" onclick="occupied(45)">45</div>
            <div id="box" class="box46" style="text-align: center" onclick="occupied(46)">46</div>
            <div id="box" class="box47" style="text-align: center" onclick="occupied(47)">47</div>
            <div id="box" class="box48" style="text-align: center" onclick="occupied(48)">48</div>
            <div id="box" class="box49" style="text-align: center" onclick="occupied(49)">49</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box107" style="text-align: center" onclick="occupied(107)">107</div>
                <div id="box" class="box108" style="text-align: center" onclick="occupied(108)">108</div>
                <div id="box" class="box109" style="text-align: center" onclick="occupied(109)">109</div>
                <div id="box" class="box110" style="text-align: center" onclick="occupied(110)">110</div>
                <div id="box" class="box111" style="text-align: center" onclick="occupied(111)">111</div>
                <div id="box" class="box112" style="text-align: center" onclick="occupied(112)">112</div>
                <div id="box" class="box113" style="text-align: center" onclick="occupied(113)">113</div>
                <div id="box" class="box114" style="text-align: center" onclick="occupied(114)">114</div>
                <div id="box" class="box115" style="text-align: center" onclick="occupied(115)">115</div>
                <div id="box" class="box116" style="text-align: center" onclick="occupied(116)">116</div>
                <div id="box" class="box117" style="text-align: center" onclick="occupied(117)">117</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box193" style="text-align: center" onclick="occupied(193)">193</div>
                <div id="box" class="box194" style="text-align: center" onclick="occupied(194)">194</div>
                <div id="box" class="box195" style="text-align: center" onclick="occupied(195)">195</div>
                <div id="box" class="box196" style="text-align: center" onclick="occupied(196)">196</div>
                <div id="box" class="box197" style="text-align: center" onclick="occupied(197)">197</div>
                <div id="box" class="box198" style="text-align: center" onclick="occupied(198)">198</div>
                <div id="box" class="box199" style="text-align: center" onclick="occupied(199)">199</div>
                <div id="box" class="box200" style="text-align: center" onclick="occupied(200)">200</div>
                <div id="box" class="box201" style="text-align: center" onclick="occupied(201)">201</div>
                <div id="box" class="box202" style="text-align: center" onclick="occupied(202)">202</div>
                <div id="box" class="box203" style="text-align: center" onclick="occupied(203)">203</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box34" style="text-align: center" onclick="occupied(34)">34</div>
            <div id="box" class="box35" style="text-align: center" onclick="occupied(35)">35</div>
            <div id="box" class="box36" style="text-align: center" onclick="occupied(36)">36</div>
            <div id="box" class="box37" style="text-align: center" onclick="occupied(37)">37</div>
                        
            <h1 id="one" onMouseOver="show_sidebar1()" onMouseOut="hide_sidebar1()">1</h1>
            <div id="box" class="box38" style="text-align: center" onclick="occupied(38)">38</div>
            <div id="box" class="box39" style="text-align: center" onclick="occupied(39)">39</div>
            <div id="box" class="box40" style="text-align: center" onclick="occupied(40)">40</div>
            <div id="box" class="box41" style="text-align: center" onclick="occupied(41)">41</div>
            <div id="box" class="box42" style="text-align: center" onclick="occupied(42)">42</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box95" style="text-align: center" onclick="occupied(95)">95</div>
                <div id="box" class="box96" style="text-align: center" onclick="occupied(96)">96</div>
                <div id="box" class="box97" style="text-align: center" onclick="occupied(97)">97</div>
                <div id="box" class="box98" style="text-align: center" onclick="occupied(98)">98</div>
                <div id="box" class="box99" style="text-align: center" onclick="occupied(99)">99</div>
                <h1 id="two" onMouseOver="show_sidebar2()" onMouseOut="hide_sidebar2()">2</h1>
                <div id="box" class="box100" style="text-align: center" onclick="occupied(100)">100</div>
                <div id="box" class="box101" style="text-align: center" onclick="occupied(101)">101</div>
                <div id="box" class="box103" style="text-align: center" onclick="occupied(103)">103</div>
                <div id="box" class="box104" style="text-align: center" onclick="occupied(104)">104</div>
                <div id="box" class="box105" style="text-align: center" onclick="occupied(105)">105</div>
                <div id="box" class="box106" style="text-align: center" onclick="occupied(106)">106</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box182" style="text-align: center" onclick="occupied(182)">182</div>
                <div id="box" class="box183" style="text-align: center" onclick="occupied(183)">183</div>
                <div id="box" class="box184" style="text-align: center" onclick="occupied(184)">184</div>
                <div id="box" class="box185" style="text-align: center" onclick="occupied(185)">185</div>
                <div id="box" class="box186" style="text-align: center" onclick="occupied(186)">186</div>
                <h1 id="three" onMouseOver="show_sidebar3()" onMouseOut="hide_sidebar3()">3</h1>
                <div id="box" class="box187" style="text-align: center" onclick="occupied(187)">187</div>
                <div id="box" class="box188" style="text-align: center" onclick="occupied(188)">188</div>
                <div id="box" class="box189" style="text-align: center" onclick="occupied(189)">189</div>
                <div id="box" class="box190" style="text-align: center" onclick="occupied(190)">190</div>
                <div id="box" class="box191" style="text-align: center" onclick="occupied(191)">191</div>
                <div id="box" class="box192" style="text-align: center" onclick="occupied(192)">192</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box24" style="text-align: center" onclick="occupied(24)">24</div>
            <div id="box" class="box25" style="text-align: center" onclick="occupied(25)">25</div>
            <div id="box" class="box26" style="text-align: center" onclick="occupied(26)">26</div>
            <div id="box" class="box27" style="text-align: center" onclick="occupied(27)">27</div>
            <div id="box" class="box28" style="text-align: center" onclick="occupied(28)">28</div>
            <div id="box" class="box29" style="text-align: center" onclick="occupied(29)">29</div>
            <div id="box" class="box30" style="text-align: center" onclick="occupied(30)">30</div>
            <div id="box" class="box31" style="text-align: center" onclick="occupied(31)">31</div>
            <div id="box" class="box32" style="text-align: center" onclick="occupied(32)">32</div>
            <div id="box" class="box33" style="text-align: center" onclick="occupied(33)">33</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box84" style="text-align: center" onclick="occupied(84)">84</div>
                <div id="box" class="box85" style="text-align: center" onclick="occupied(85)">85</div>
                <div id="box" class="box86" style="text-align: center" onclick="occupied(86)">86</div>
                <div id="box" class="box87" style="text-align: center" onclick="occupied(87)">87</div>
                <div id="box" class="box88" style="text-align: center" onclick="occupied(88)">88</div>
                <div id="box" class="box89" style="text-align: center" onclick="occupied(89)">89</div>
                <div id="box" class="box90" style="text-align: center" onclick="occupied(90)">90</div>
                <div id="box" class="box91" style="text-align: center" onclick="occupied(91)">91</div>
                <div id="box" class="box92" style="text-align: center" onclick="occupied(92)">92</div>
                <div id="box" class="box93" style="text-align: center" onclick="occupied(93)">93</div>
                <div id="box" class="box94" style="text-align: center" onclick="occupied(94)">94</div>
            </div>


            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box171" style="text-align: center" onclick="occupied(171)">171</div>
                <div id="box" class="box172" style="text-align: center" onclick="occupied(172)">172</div>
                <div id="box" class="box173" style="text-align: center" onclick="occupied(173)">173</div>
                <div id="box" class="box174" style="text-align: center" onclick="occupied(174)">174</div>
                <div id="box" class="box175" style="text-align: center" onclick="occupied(175)">175</div>
                <div id="box" class="box176" style="text-align: center" onclick="occupied(176)">176</div>
                <div id="box" class="box177" style="text-align: center" onclick="occupied(177)">177</div>
                <div id="box" class="box178" style="text-align: center" onclick="occupied(178)">178</div>
                <div id="box" class="box179" style="text-align: center" onclick="occupied(179)">179</div>
                <div id="box" class="box180" style="text-align: center" onclick="occupied(180)">180</div>
                <div id="box" class="box181" style="text-align: center" onclick="occupied(181)">181</div>
            </div>
        </div>
        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box13" style="text-align: center" onclick="occupied(13)">13</div>
            <div id="box" class="box14" style="text-align: center" onclick="occupied(14)">14</div>
            <div id="box" class="box15" style="text-align: center" onclick="occupied(15)">15</div>
            <div id="box" class="box16" style="text-align: center" onclick="occupied(16)">16</div>
            <div id="box" class="box17" style="text-align: center" onclick="occupied(17)">17</div>
            <div id="box" class="box18" style="text-align: center" onclick="occupied(18)">18</div>
            <div id="box" class="box19" style="text-align: center" onclick="occupied(19)">19</div>
            <div id="box" class="box20" style="text-align: center" onclick="occupied(20)">20</div>
            <div id="box" class="box21" style="text-align: center" onclick="occupied(21)">21</div>
            <div id="box" class="box22" style="text-align: center" onclick="occupied(22)">22</div>
            <div id="box" class="box23" style="text-align: center" onclick="occupied(23)">23</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box73" style="text-align: center" onclick="occupied(73)">73</div>
                <div id="box" class="box74" style="text-align: center" onclick="occupied(74)">74</div>
                <div id="box" class="box75" style="text-align: center" onclick="occupied(75)">75</div>
                <div id="box" class="box76" style="text-align: center" onclick="occupied(76)">76</div>
                <div id="box" class="box77" style="text-align: center" onclick="occupied(77)">77</div>
                <div id="box" class="box78" style="text-align: center" onclick="occupied(78)">78</div>
                <div id="box" class="box79" style="text-align: center" onclick="occupied(79)">79</div>
                <div id="box" class="box80" style="text-align: center" onclick="occupied(80)">80</div>
                <div id="box" class="box81" style="text-align: center" onclick="occupied(81)">81</div>
                <div id="box" class="box82" style="text-align: center" onclick="occupied(82)">82</div>
                <div id="box" class="box83" style="text-align: center" onclick="occupied(83)">83</div>
            </div>


            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box160" style="text-align: center" onclick="occupied(160)">160</div>
                <div id="box" class="box161" style="text-align: center" onclick="occupied(161)">161</div>
                <div id="box" class="box162" style="text-align: center" onclick="occupied(162)">162</div>
                <div id="box" class="box163" style="text-align: center" onclick="occupied(163)">163</div>
                <div id="box" class="box164" style="text-align: center" onclick="occupied(164)">164</div>
                <div id="box" class="box165" style="text-align: center" onclick="occupied(165)">165</div>
                <div id="box" class="box166" style="text-align: center" onclick="occupied(166)">166</div>
                <div id="box" class="box167" style="text-align: center" onclick="occupied(167)">167</div>
                <div id="box" class="box168" style="text-align: center" onclick="occupied(168)">168</div>
                <div id="box" class="box169" style="text-align: center" onclick="occupied(169)">169</div>
                <div id="box" class="box170" style="text-align: center" onclick="occupied(170)">170</div>
            </div>
        </div>
        
        <div class="d-flex align-items-center">

            <div id="box" class="box1" style="text-align: center" onclick="occupied(1)">1</div>
            <div id="box" class="box2" style="text-align: center" onclick="occupied(2)">2</div>
            <div id="box" class="box3" style="text-align: center" onclick="occupied(3)">3</div>
            <div id="box" class="box4" style="text-align: center" onclick="occupied(4)">4</div>
            <div id="box" class="box5" style="text-align: center" onclick="occupied(5)">5</div>
            <div id="box" class="box6" style="text-align: center" onclick="occupied(6)">6</div>
            <div id="box" class="box7" style="text-align: center" onclick="occupied(7)">7</div>
            <div id="box" class="box8" style="text-align: center" onclick="occupied(8)">8</div>
            <div id="box" class="box9" style="text-align: center" onclick="occupied(9)">9</div>
            <div id="box" class="box10" style="text-align: center" onclick="occupied(10)">10</div>
            <div id="box" class="box11" style="text-align: center" onclick="occupied(11)">11</div>
            <div id="box" class="box12" style="text-align: center" onclick="occupied(12)">12</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box62" style="text-align: center" onclick="occupied(62)">62</div>
                <div id="box" class="box63" style="text-align: center" onclick="occupied(63)">63</div>
                <div id="box" class="box64" style="text-align: center" onclick="occupied(64)">64</div>
                <div id="box" class="box65" style="text-align: center" onclick="occupied(65)">65</div>
                <div id="box" class="box66" style="text-align: center" onclick="occupied(66)">66</div>
                <div id="box" class="box67" style="text-align: center" onclick="occupied(67)">67</div>
                <div id="box" class="box68" style="text-align: center" onclick="occupied(68)">68</div>
                <div id="box" class="box69" style="text-align: center" onclick="occupied(69)">69</div>
                <div id="box" class="box70" style="text-align: center" onclick="occupied(70)">70</div>
                <div id="box" class="box71" style="text-align: center" onclick="occupied(71)">71</div>
                <div id="box" class="box72" style="text-align: center" onclick="occupied(72)">72</div>
            </div>


             <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box149" style="text-align: center" onclick="occupied(149)">149</div>
                <div id="box" class="box150" style="text-align: center" onclick="occupied(150)">150</div>
                <div id="box" class="box151" style="text-align: center" onclick="occupied(151)">151</div>
                <div id="box" class="box152" style="text-align: center" onclick="occupied(152)">152</div>
                <div id="box" class="box153" style="text-align: center" onclick="occupied(153)">153</div>
                <div id="box" class="box154" style="text-align: center" onclick="occupied(154)">154</div>
                <div id="box" class="box155" style="text-align: center" onclick="occupied(155)">155</div>
                <div id="box" class="box156" style="text-align: center" onclick="occupied(156)">156</div>
                <div id="box" class="box157" style="text-align: center" onclick="occupied(157)">157</div>
                <div id="box" class="box158" style="text-align: center" onclick="occupied(158)">158</div>
                <div id="box" class="box159" style="text-align: center" onclick="occupied(159)">159</div>
            </div>
        </div>
    </div>






    <div style="font-weight: 800; font-size: 19px; color: white; background-color: #808080c2; height: 50px">
        Entrance
        <!-- <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50">
        <img src='{{ asset("storage/people/arrow.png") }}' alt="" width="50"> -->
    </div>





    <div class="container" style="margin-bottom: 50px">
        <div class="d-flex align-items-center">
            <div id="box" class="box227" style="text-align: center" onclick="occupied(227)">227</div>
            <div id="box" class="box228" style="text-align: center" onclick="occupied(228)">228</div>
            <div id="box" class="box229" style="text-align: center" onclick="occupied(229)">229</div>
            <div id="box" class="box230" style="text-align: center" onclick="occupied(230)">230</div>
            <div id="box" class="box231" style="text-align: center" onclick="occupied(231)">231</div>
            <div id="box" class="box232" style="text-align: center" onclick="occupied(232)">232</div>
            <div id="box" class="box233" style="text-align: center" onclick="occupied(233)">233</div>
            <div id="box" class="box234" style="text-align: center" onclick="occupied(234)">234</div>
            <div id="box" class="box235" style="text-align: center" onclick="occupied(235)">235</div>
            <div id="box" class="box236" style="text-align: center" onclick="occupied(236)">236</div>
            <div id="box" class="box237" style="text-align: center" onclick="occupied(237)">237</div>
            <div id="box" class="box238" style="text-align: center" onclick="occupied(238)">238</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box289" style="text-align: center" onclick="occupied(289)">289</div>
                <div id="box" class="box290" style="text-align: center" onclick="occupied(290)">290</div>
                <div id="box" class="box291" style="text-align: center" onclick="occupied(291)">291</div>
                <div id="box" class="box293" style="text-align: center" onclick="occupied(293)">293</div>
                <div id="box" class="box294" style="text-align: center" onclick="occupied(294)">294</div>
                <div id="box" class="box295" style="text-align: center" onclick="occupied(295)">295</div>
                <div id="box" class="box296" style="text-align: center" onclick="occupied(296)">296</div>
                <div id="box" class="box297" style="text-align: center" onclick="occupied(297)">297</div>
                <div id="box" class="box298" style="text-align: center" onclick="occupied(298)">298</div>
                <div id="box" class="box299" style="text-align: center" onclick="occupied(299)">299</div>
                <div id="box" class="box300" style="text-align: center" onclick="occupied(300)">300</div>
            </div>


             <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box376" style="text-align: center" onclick="occupied(376)">376</div>
                <div id="box" class="box377" style="text-align: center" onclick="occupied(377)">377</div>
                <div id="box" class="box378" style="text-align: center" onclick="occupied(378)">378</div>
                <div id="box" class="box379" style="text-align: center" onclick="occupied(379)">379</div>
                <div id="box" class="box380" style="text-align: center" onclick="occupied(380)">380</div>
                <div id="box" class="box381" style="text-align: center" onclick="occupied(381)">381</div>
                <div id="box" class="box382" style="text-align: center" onclick="occupied(382)">382</div>
                <div id="box" class="box383" style="text-align: center" onclick="occupied(383)">383</div>
                <div id="box" class="box384" style="text-align: center" onclick="occupied(384)">384</div>
                <div id="box" class="box385" style="text-align: center" onclick="occupied(385)">385</div>
                <div id="box" class="box386" style="text-align: center" onclick="occupied(386)">386</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box239" style="text-align: center" onclick="occupied(239)">239</div>
            <div id="box" class="box240" style="text-align: center" onclick="occupied(240)">240</div>
            <div id="box" class="box241" style="text-align: center" onclick="occupied(241)">241</div>
            <div id="box" class="box242" style="text-align: center" onclick="occupied(242)">242</div>
            <div id="box" class="box243" style="text-align: center" onclick="occupied(243)">243</div>
            <div id="box" class="box244" style="text-align: center" onclick="occupied(244)">244</div>
            <div id="box" class="box245" style="text-align: center" onclick="occupied(245)">245</div>
            <div id="box" class="box246" style="text-align: center" onclick="occupied(246)">246</div>
            <div id="box" class="box247" style="text-align: center" onclick="occupied(247)">247</div>
            <div id="box" class="box248" style="text-align: center" onclick="occupied(248)">248</div>
            <div id="box" class="box250" style="text-align: center" onclick="occupied(250)">250</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box301" style="text-align: center" onclick="occupied(301)">301</div>
                <div id="box" class="box302" style="text-align: center" onclick="occupied(302)">302</div>
                <div id="box" class="box303" style="text-align: center" onclick="occupied(303)">303</div>
                <div id="box" class="box304" style="text-align: center" onclick="occupied(304)">304</div>
                <div id="box" class="box305" style="text-align: center" onclick="occupied(305)">305</div>
                <div id="box" class="box306" style="text-align: center" onclick="occupied(306)">306</div>
                <div id="box" class="box307" style="text-align: center" onclick="occupied(307)">307</div>
                <div id="box" class="box308" style="text-align: center" onclick="occupied(308)">308</div>
                <div id="box" class="box309" style="text-align: center" onclick="occupied(309)">309</div>
                <div id="box" class="box310" style="text-align: center" onclick="occupied(310)">310</div>
                <div id="box" class="box311" style="text-align: center" onclick="occupied(311)">311</div>
            </div>


            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box387" style="text-align: center" onclick="occupied(387)">387</div>
                <div id="box" class="box388" style="text-align: center" onclick="occupied(388)">388</div>
                <div id="box" class="box389" style="text-align: center" onclick="occupied(389)">389</div>
                <div id="box" class="box390" style="text-align: center" onclick="occupied(390)">390</div>
                <div id="box" class="box391" style="text-align: center" onclick="occupied(391)">391</div>
                <div id="box" class="box392" style="text-align: center" onclick="occupied(392)">392</div>
                <div id="box" class="box393" style="text-align: center" onclick="occupied(393)">393</div>
                <div id="box" class="box394" style="text-align: center" onclick="occupied(394)">394</div>
                <div id="box" class="box395" style="text-align: center" onclick="occupied(395)">395</div>
                <div id="box" class="box396" style="text-align: center" onclick="occupied(396)">396</div>
                <div id="box" class="box397" style="text-align: center" onclick="occupied(397)">397</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box251" style="text-align: center" onclick="occupied(251)">251</div>
            <div id="box" class="box252" style="text-align: center" onclick="occupied(252)">252</div>
            <div id="box" class="box253" style="text-align: center" onclick="occupied(253)">253</div>
            <div id="box" class="box254" style="text-align: center" onclick="occupied(254)">254</div>
            <div id="box" class="box255" style="text-align: center" onclick="occupied(255)">255</div>
            <div id="box" class="box256" style="text-align: center" onclick="occupied(256)">256</div>
            <div id="box" class="box257" style="text-align: center" onclick="occupied(257)">257</div>
            <div id="box" class="box258" style="text-align: center" onclick="occupied(258)">258</div>
            <div id="box" class="box259" style="text-align: center" onclick="occupied(259)">259</div>
            <div id="box" class="box260" style="text-align: center" onclick="occupied(260)">260</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box312" style="text-align: center" onclick="occupied(312)">312</div>
                <div id="box" class="box313" style="text-align: center" onclick="occupied(313)">313</div>
                <div id="box" class="box314" style="text-align: center" onclick="occupied(314)">314</div>
                <div id="box" class="box315" style="text-align: center" onclick="occupied(315)">315</div>
                <div id="box" class="box316" style="text-align: center" onclick="occupied(316)">316</div>
                <div id="box" class="box317" style="text-align: center" onclick="occupied(317)">317</div>
                <div id="box" class="box318" style="text-align: center" onclick="occupied(318)">318</div>
                <div id="box" class="box319" style="text-align: center" onclick="occupied(319)">319</div>
                <div id="box" class="box320" style="text-align: center" onclick="occupied(320)">320</div>
                <div id="box" class="box321" style="text-align: center" onclick="occupied(321)">321</div>
                <div id="box" class="box322" style="text-align: center" onclick="occupied(322)">322</div>
            </div>


            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box322" style="text-align: center" onclick="occupied(398)">398</div>
                <div id="box" class="box399" style="text-align: center" onclick="occupied(399)">399</div>
                <div id="box" class="box401" style="text-align: center" onclick="occupied(401)">401</div>
                <div id="box" class="box402" style="text-align: center" onclick="occupied(402)">402</div>
                <div id="box" class="box403" style="text-align: center" onclick="occupied(403)">403</div>
                <div id="box" class="box404" style="text-align: center" onclick="occupied(404)">404</div>
                <div id="box" class="box405" style="text-align: center" onclick="occupied(405)">405</div>
                <div id="box" class="box406" style="text-align: center" onclick="occupied(406)">406</div>
                <div id="box" class="box407" style="text-align: center" onclick="occupied(407)">407</div>
                <div id="box" class="box408" style="text-align: center" onclick="occupied(408)">408</div>
                <div id="box" class="box409" style="text-align: center" onclick="occupied(409)">409</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box261" style="text-align: center" onclick="occupied(261)">261</div>
            <div id="box" class="box262" style="text-align: center" onclick="occupied(262)">262</div>
            <div id="box" class="box263" style="text-align: center" onclick="occupied(263)">263</div>
            <div id="box" class="box264" style="text-align: center" onclick="occupied(264)">264</div>
            <h1 id="four" onMouseOver="show_sidebar4()" onMouseOut="hide_sidebar4()">4</h1>
            <div id="box" class="box265" style="text-align: center" onclick="occupied(265)">265</div>
            <div id="box" class="box266" style="text-align: center" onclick="occupied(266)">266</div>
            <div id="box" class="box267" style="text-align: center" onclick="occupied(267)">267</div>
            <div id="box" class="box268" style="text-align: center" onclick="occupied(268)">268</div>
            <div id="box" class="box269" style="text-align: center" onclick="occupied(269)">269</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box323" style="text-align: center" onclick="occupied(323)">323</div>
                <div id="box" class="box324" style="text-align: center" onclick="occupied(324)">324</div>
                <div id="box" class="box325" style="text-align: center" onclick="occupied(325)">325</div>
                <div id="box" class="box326" style="text-align: center" onclick="occupied(326)">326</div>
                <div id="box" class="box327" style="text-align: center" onclick="occupied(327)">327</div>
                <div id="box" class="box328" style="text-align: center" onclick="occupied(328)">328</div>
                <div id="box" class="box329" style="text-align: center" onclick="occupied(329)">329</div>
                <div id="box" class="box330" style="text-align: center" onclick="occupied(330)">330</div>
                <div id="box" class="box331" style="text-align: center" onclick="occupied(331)">331</div>
                <div id="box" class="box332" style="text-align: center" onclick="occupied(332)">332</div>
                <div id="box" class="box333" style="text-align: center" onclick="occupied(333)">333</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box410" style="text-align: center" onclick="occupied(410)">410</div>
                <div id="box" class="box411" style="text-align: center" onclick="occupied(411)">411</div>
                <div id="box" class="box412" style="text-align: center" onclick="occupied(412)">412</div>
                <div id="box" class="box413" style="text-align: center" onclick="occupied(413)">413</div>
                <div id="box" class="box414" style="text-align: center" onclick="occupied(414)">414</div>
                <h1 id="six" onMouseOver="show_sidebar6()" onMouseOut="hide_sidebar6()">6</h1>
                <div id="box" class="box415" style="text-align: center" onclick="occupied(415)">415</div>
                <div id="box" class="box416" style="text-align: center" onclick="occupied(416)">416</div>
                <div id="box" class="box417" style="text-align: center" onclick="occupied(417)">417</div>
                <div id="box" class="box418" style="text-align: center" onclick="occupied(418)">418</div>
                <div id="box" class="box419" style="text-align: center" onclick="occupied(419)">419</div>
                <div id="box" class="box420" style="text-align: center" onclick="occupied(420)">420</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box270" style="text-align: center" onclick="occupied(270)">270</div>
            <div id="box" class="box271" style="text-align: center" onclick="occupied(271)">271</div>
            <div id="box" class="box272" style="text-align: center" onclick="occupied(272)">272</div>
            <div id="box" class="box273" style="text-align: center" onclick="occupied(273)">273</div>
            <div id="box" class="box274" style="text-align: center" onclick="occupied(274)">274</div>
            <div id="box" class="box275" style="text-align: center" onclick="occupied(275)">275</div>
            <div id="box" class="box276" style="text-align: center" onclick="occupied(276)">276</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box334" style="text-align: center" onclick="occupied(334)">334</div>
                <div id="box" class="box335" style="text-align: center" onclick="occupied(335)">335</div>
                <div id="box" class="box336" style="text-align: center" onclick="occupied(336)">336</div>
                <div id="box" class="box337" style="text-align: center" onclick="occupied(337)">337</div>
                <div id="box" class="box338" style="text-align: center" onclick="occupied(338)">338</div>
                <h1 id="five" onMouseOver="show_sidebar5()" onMouseOut="hide_sidebar5()">5</h1>
                <div id="box" class="box339" style="text-align: center" onclick="occupied(339)">339</div>
                <div id="box" class="box340" style="text-align: center" onclick="occupied(340)">340</div>
                <div id="box" class="box341" style="text-align: center" onclick="occupied(341)">341</div>
                <div id="box" class="box342" style="text-align: center" onclick="occupied(342)">342</div>
                <div id="box" class="box343" style="text-align: center" onclick="occupied(343)">343</div>
                <div id="box" class="box344" style="text-align: center" onclick="occupied(344)">344</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box421" style="text-align: center" onclick="occupied(421)">421</div>
                <div id="box" class="box422" style="text-align: center" onclick="occupied(422)">422</div>
                <div id="box" class="box423" style="text-align: center" onclick="occupied(423)">423</div>
                <div id="box" class="box424" style="text-align: center" onclick="occupied(424)">424</div>
                <div id="box" class="box425" style="text-align: center" onclick="occupied(425)">425</div>
                <div id="box" class="box426" style="text-align: center" onclick="occupied(426)">426</div>
                <div id="box" class="box427" style="text-align: center" onclick="occupied(427)">427</div>
                <div id="box" class="box429" style="text-align: center" onclick="occupied(429)">429</div>
                <div id="box" class="box430" style="text-align: center" onclick="occupied(430)">430</div>
                <div id="box" class="box431" style="text-align: center" onclick="occupied(431)">431</div>
                <div id="box" class="box432" style="text-align: center" onclick="occupied(432)">432</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box277" style="text-align: center" onclick="occupied(277)">277</div>
            <div id="box" class="box278" style="text-align: center" onclick="occupied(278)">278</div>
            <div id="box" class="box279" style="text-align: center" onclick="occupied(279)">279</div>
            <div id="box" class="box280" style="text-align: center" onclick="occupied(280)">280</div>
            <div id="box" class="box281" style="text-align: center" onclick="occupied(281)">281</div>
            <div id="box" class="box282" style="text-align: center" onclick="occupied(282)">282</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box345" style="text-align: center" onclick="occupied(345)">345</div>
                <div id="box" class="box346" style="text-align: center" onclick="occupied(346)">346</div>
                <div id="box" class="box347" style="text-align: center" onclick="occupied(347)">347</div>
                <div id="box" class="box348" style="text-align: center" onclick="occupied(348)">348</div>
                <div id="box" class="box349" style="text-align: center" onclick="occupied(349)">349</div>
                <div id="box" class="box350" style="text-align: center" onclick="occupied(350)">350</div>
                <div id="box" class="box351" style="text-align: center" onclick="occupied(351)">351</div>
                <div id="box" class="box352" style="text-align: center" onclick="occupied(352)">352</div>
                <div id="box" class="box353" style="text-align: center" onclick="occupied(353)">353</div>
                <div id="box" class="box354" style="text-align: center" onclick="occupied(354)">354</div>
                <div id="box" class="box355" style="text-align: center" onclick="occupied(355)">355</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box433" style="text-align: center" onclick="occupied(433)">433</div>
                <div id="box" class="box434" style="text-align: center" onclick="occupied(434)">434</div>
                <div id="box" class="box435" style="text-align: center" onclick="occupied(435)">435</div>
                <div id="box" class="box436" style="text-align: center" onclick="occupied(436)">436</div>
                <div id="box" class="box437" style="text-align: center" onclick="occupied(437)">437</div>
                <div id="box" class="box438" style="text-align: center" onclick="occupied(438)">438</div>
                <div id="box" class="box439" style="text-align: center" onclick="occupied(439)">439</div>
                <div id="box" class="box440" style="text-align: center" onclick="occupied(440)">440</div>
                <div id="box" class="box441" style="text-align: center" onclick="occupied(441)">441</div>
                <div id="box" class="box442" style="text-align: center" onclick="occupied(442)">442</div>
                <div id="box" class="box443" style="text-align: center" onclick="occupied(443)">443</div>
            </div>
        </div>


        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box283" style="text-align: center" onclick="occupied(283)">283</div>
            <div id="box" class="box284" style="text-align: center" onclick="occupied(284)">284</div>
            <div id="box" class="box285" style="text-align: center" onclick="occupied(285)">285</div>
            <div id="box" class="box286" style="text-align: center" onclick="occupied(286)">286</div>
            

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box356" style="text-align: center" onclick="occupied(356)">356</div>
                <div id="box" class="box357" style="text-align: center" onclick="occupied(357)">357</div>
                <div id="box" class="box358" style="text-align: center" onclick="occupied(358)">358</div>
                <div id="box" class="box359" style="text-align: center" onclick="occupied(359)">359</div>
                <div id="box" class="box360" style="text-align: center" onclick="occupied(360)">360</div>
                <div id="box" class="box361" style="text-align: center" onclick="occupied(361)">361</div>
                <div id="box" class="box362" style="text-align: center" onclick="occupied(362)">362</div>
                <div id="box" class="box363" style="text-align: center" onclick="occupied(363)">363</div>
                <div id="box" class="box364" style="text-align: center" onclick="occupied(364)">364</div>
                <div id="box" class="box365" style="text-align: center" onclick="occupied(365)">365</div>
                <div id="box" class="box366" style="text-align: center" onclick="occupied(366)">366</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="box" class="box444" style="text-align: center" onclick="occupied(444)">444</div>
                <div id="box" class="box445" style="text-align: center" onclick="occupied(445)">445</div>
                <div id="box" class="box446" style="text-align: center" onclick="occupied(446)">446</div>
                <div id="box" class="box447" style="text-align: center" onclick="occupied(447)">447</div>
                <div id="box" class="box448" style="text-align: center" onclick="occupied(448)">448</div>
                <div id="box" class="box449" style="text-align: center" onclick="occupied(449)">449</div>
                <div id="box" class="box450" style="text-align: center" onclick="occupied(450)">450</div>
                <div id="box" class="box451" style="text-align: center" onclick="occupied(451)">451</div>
                <div id="box" class="box452" style="text-align: center" onclick="occupied(452)">452</div>
                <div id="box" class="box453" style="text-align: center" onclick="occupied(453)">453</div>
                <div id="box" class="box454" style="text-align: center" onclick="occupied(454)">454</div>
            </div>
        </div>








        <div class="d-flex align-items-center" >
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
            <div id="box" class="box287" style="text-align: center" onclick="occupied(287)">287</div>
            <div id="box" class="box288" style="text-align: center" onclick="occupied(288)">288</div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="box" class="box367" style="text-align: center" onclick="occupied(367)">367</div>
                <div id="box" class="box368" style="text-align: center" onclick="occupied(368)">368</div>
                <div id="box" class="box369" style="text-align: center" onclick="occupied(369)">369</div>
                <div id="box" class="box370" style="text-align: center" onclick="occupied(370)">370</div>
                <div id="box" class="box371" style="text-align: center" onclick="occupied(371)">371</div>
                <div id="box" class="box372" style="text-align: center" onclick="occupied(372)">372</div>
                <div id="box" class="box373" style="text-align: center" onclick="occupied(373)">373</div>
                <div id="box" class="box374" style="text-align: center" onclick="occupied(374)">374</div>
                <div id="box" class="box375" style="text-align: center" onclick="occupied(375)">375</div>
            </div>

            <div class="d-flex align-items-center" style="margin-left: 30px">
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="boxs" style="text-align: center; border-top: 0; border-left: 0; border-bottom: 0; border-right: 0;"></div>
                <div id="box" class="box455" style="text-align: center" onclick="occupied(455)">455</div>
                <div id="box" class="box456" style="text-align: center" onclick="occupied(456)">456</div>
                <div id="box" class="box457" style="text-align: center" onclick="occupied(457)">457</div>
                <div id="box" class="box458" style="text-align: center" onclick="occupied(458)">458</div>
                <div id="box" class="box459" style="text-align: center" onclick="occupied(459)">459</div>
                <div id="box" class="box460" style="text-align: center" onclick="occupied(460)">460</div>
                <div id="box" class="box461" style="text-align: center" onclick="occupied(461)">461</div>
                <div id="box" class="box462" style="text-align: center" onclick="occupied(462)">462</div>
                <div id="box" class="box463" style="text-align: center" onclick="occupied(463)">463</div>
            </div>
        </div>
    </div>

    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cemetery No. <b id="no">12</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/reserve') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" name="cemetery_no" id="cemetery_no">
                        <input type="hidden" value="" name="block_no" id="block_no">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">First name</label>
                            <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="Juan">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Last name</label>
                            <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Ponze">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Middle name</label>
                            <input type="text" name="middlename" class="form-control" id="exampleFormControlInput1" placeholder="Ponze">
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Born date</label>
                                    <input type="date" name="born_date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Die date</label>
                                    <input type="date" name="die_date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Type of Lot</label>
                            <select class="form-select" name="lot" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="Lawn Lot">Lawn Lot</option>
                                <option value="Two Lawn Lot">Two Lawn Lot</option>
                                <option value="Memorial Garden">Memorial Garden</option>
                                <option value="Single Niche">Single Niche</option>
                                <option value="Junior Estat">Junior Estate</option>
                                <option value="Senior Estate">Senior Estate</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User image</label>
                            <input type="file" name="file_name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="getOnePeople" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cemetery No. <b id="nos">1s2</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">(<b id="status">Reserve</b>)</h5>  
                                <input type="hidden" value="" name="people_cemetery_no" id="people_cemetery_no">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name</label>
                                    <input type="text" name="middlename" disabled  class="form-control" id="middlename" placeholder="Ponze">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Type of Lot</label>
                                    <input type="text" name="typeoflot" disabled  class="form-control" id="typeoflot" placeholder="Ponze">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date Acquired</label>
                                    <input type="date" name="born_date" class="form-control" id="born_date" disabled>
                                </div>
                                </div>
                            </div>
                        <!-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User image</label><br>
                            <img src="" style="width: 250px; height: 250px" alt="">
                        </div> -->
                        <div id="ifExist" style="margin-top: 20px">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">(<b id="status1">Reserve</b>)</h5> 
                            <input type="hidden" value="" name="people_cemetery_no" id="people_cemetery_no">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First name</label>
                                <input type="text" name="firstname" class="form-control" id="firstname1" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                <input type="text" name="lastname" class="form-control" id="lastname1" disabled>
                            </div>
                            <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name</label>
                                    <input type="text" name="middlename1" disabled  class="form-control" id="middlename1" placeholder="Ponze">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Type of Lot</label>
                                    <input type="text" name="typeoflot" disabled  class="form-control" id="typeoflot1" placeholder="Ponze">
                                </div>
                                <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Date Acquired</label>
                                        <input type="date" name="born_date" class="form-control" id="born_date1" disabled>
                                    </div>
                        </div>
                        </div>
                            </div>

                        <div id="add" style="margin-top: 20px">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Add new</b></h5>
                                    <hr>
                                    <form action="{{ url('/reserve') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="" name="cemetery_no" id="cemetery_noz">
                                        <input type="hidden" value="" name="block_no" id="block_noz">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">First name</label>
                                            <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="Juan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                            <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Ponze">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Middle name</label>
                                            <input type="text" name="middlename" class="form-control" id="exampleFormControlInput1" placeholder="Ponze">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Born date</label>
                                                    <input type="date" name="born_date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Die date</label>
                                                    <input type="date" name="die_date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Type of Lot</label>
                                            <select class="form-select" name="lot" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="Lawn Lot">Lawn Lot</option>
                                                <option value="Two Lawn Lot">Two Lawn Lot</option>
                                                <option value="Memorial Garden">Memorial Garden</option>
                                                <option value="Single Niche">Single Niche</option>
                                                <option value="Junior Estat">Junior Estate</option>
                                                <option value="Senior Estate">Senior Estate</option>
                                            </select>
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">User image</label>
                                            <input type="file" name="file_name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div> -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        


                        <div class="modal-footer">
                            <a onclick="add()" id="addclick" class="btn btn-primary">Add</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cemetery No. <b id="no2">12</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" name="cemetery_no" id="cemetery_no1">
                        <input type="hidden" value="" name="block_no" id="block_no1">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">First name</label>
                            <input type="text" name="firstname" class="form-control" id="fname" placeholder="Juan">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Last name</label>
                            <input type="text" name="lastname" class="form-control" id="lname" placeholder="Ponze">
                        </div>
                        <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Middle name</label>
                                    <input type="text" name="middlename"  class="form-control" id="mname" placeholder="Ponze">
                                </div>
                          
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Type of Lot</label>
                            <select class="form-select" name="lot" aria-label="Default select example">
                                <option selected id="selected">Open this select menu</option>
                                <option value="Lawn Lot">Lawn Lot</option>
                                <option value="Two Lawn Lot">Two Lawn Lot</option>
                                <option value="Memorial Garden">Memorial Garden</option>
                                <option value="Single Niche">Single Niche</option>
                                <option value="Junior Estat">Junior Estate</option>
                                <option value="Senior Estate">Senior Estate</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">User image</label>
                            <input type="file" name="file_name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
<script>
    function show_sidebar1() { $('#one').addClass('none'); }
    function hide_sidebar1() { $('#one').removeClass('none'); }

    function show_sidebar2() { $('#two').addClass('none'); }
    function hide_sidebar2() { $('#two').removeClass('none'); }

    function show_sidebar3() { $('#three').addClass('none'); }
    function hide_sidebar3() { $('#three').removeClass('none'); }

    function show_sidebar4() { $('#four').addClass('none'); }
    function hide_sidebar4() { $('#four').removeClass('none'); }

    function show_sidebar5() { $('#five').addClass('none'); }
    function hide_sidebar5() { $('#five').removeClass('none'); }

    function show_sidebar6() { $('#six').addClass('none'); }
    function hide_sidebar6() { $('#six').removeClass('none'); }

    // var res = $('#url').val().split('/')[4];
    // if (res == "request") {
    //     $('#url_name').text("Request");
    //     $("#route").attr("href", "/map/index");
    //     $('#route').text("Request");
    // } else {
    //     $('#url_name').text("Deceased Person");
    // }
    // console.log(res)

    // hide_sidebar

    function reserve() {
        $.ajax({
            url : "{{ route('cemetery') }}",
            type: "GET",
            success: function(response) {
                console.log(response)
                response.forEach(element => {
                    if (element.status == 'occupied') {
                        $(".box"+element.cemetery_no).addClass('occupied');
                    } else {
                        if (element.created_by == 'admin') {
                            $(".box"+element.cemetery_no).addClass('reserve-admin');
                        } else {
                            $(".box"+element.cemetery_no).addClass('reserve');
                        }
                        
                    }
                    
                });
            }
        });
    }

    reserve();

    function add() {
        $('#add').css('display', 'block');
        $('#addclick').css('display', 'none');
    }

    function occupied(number) {
        var attr = $('.box'+number).attr('class');
        var status = attr.split(' ')[1]
        if (status == 'reserve' || status == 'occupied' || status == 'reserve-admin') {
            $("#getOnePeople").modal('show');
            $.ajax({
                url : "/people/"+number,
                type: "GET",
                data: { cemetery_no: number },
                success: function(response) {
                    if (response.length == '2') {
                        console.log(response[0].middle_name)
                        $('#add').css('display', 'none');
                        $('#ifExist').css('display', 'block');
                        var borndate = response[0].born_date.split(' ')[0];
                        var diedate = response[0].die_date.split(' ')[0];
                        if (response[0].status == 'reserve-admin') {
                            $('#status').text('reserve');
                        } else {
                            $('#status').text(response[0].status);
                        }
                        if (response[0].status == 'occupied') {
                            $('#status').css('color', 'red');
                        } else {
                            $('#status').css('color', 'yellow');
                        }
                        $('#nos').text(number);
                        $('#firstname').val(response[0].first_name);
                        $('#lastname').val(response[0].last_name);
                        $('#middlename').val(response[0].middle_name);
                        $('#typeoflot').val(response[0].type_of_lot);
                        $('#born_date').val(borndate);
                        $('#die_date').val(diedate);
                        $("img").attr("src",'storage/people/'+response[0].user_image);

                        var borndate = response[1].born_date.split(' ')[0];
                        var diedate = response[1].die_date.split(' ')[0];
                        if (response[1].status == 'reserve-admin') {
                            $('#status1').text('reserve');
                        } else {
                            $('#status1').text(response[1].status);
                        }
                        if (response[1].status == 'occupied') {
                            $('#status1').css('color', 'red');
                        } else {
                            $('#status1').css('color', 'yellow');
                        }
                        $('#nos1').text(number);
                        $('#firstname1').val(response[1].first_name);
                        $('#lastname1').val(response[1].last_name);
                        $('#middlename1').val(response[1].middle_name);
                        $('#typeoflot1').val(response[1].type_of_lot);
                        $('#born_date1').val(borndate);
                        $('#die_date1').val(diedate);
                        $("img1").attr("src",'storage/people/'+response[1].user_image);
                    } else {
                        $('#ifExist').css('display', 'none');
                        $('#add').css('display', 'none');
                        $('#addclick').css('display', 'block');
                        var borndate = response[0].born_date.split(' ')[0];
                        var diedate = response[0].die_date.split(' ')[0];
                        if (response[0].status == 'reserve-admin') {
                            $('#status').text('reserve');
                        } else {
                            $('#status').text(response[0].status);
                        }
                        if (response[0].status == 'occupied') {
                            $('#status').css('color', 'red');
                        } else {
                            $('#status').css('color', 'yellow');
                        }
                        $('#nos').text(number);
                        $('#firstname').val(response[0].first_name);
                        $('#lastname').val(response[0].last_name);
                        $('#middlename').val(response[0].middle_name);
                        $('#typeoflot').val(response[0].type_of_lot);
                        $('#born_date').val(borndate);
                        $('#die_date').val(diedate);
                        $("img").attr("src",'storage/people/'+response[0].user_image);

                        var test = $('#cemetery_noz').val(number)

                        if (number <= 61) {
                            $('#block_no').val('1')
                            $('#block_noz').val('1')
                        } else if (number > 61 && number < 141) {
                            $('#block_no').val('2')
                            $('#block_noz').val('2')
                        } else if (number > 140 && number < 235) {
                            $('#block_no').val('3')
                            $('#block_noz').val('3')
                        } else if (number > 234 && number < 289) {
                            $('#block_no').val('4')
                            $('#block_noz').val('4')
                        } else if (number > 288 && number < 376) {
                            $('#block_no').val('5')
                            $('#block_noz').val('5')
                        } else {
                            $('#block_no').val('6')
                            $('#block_noz').val('6')
                        }

                    }
                    
                }
            });
        } else {
            $('#no').text(number)
            $('#cemetery_no').val(number)
            $('#block_no').val(number)
            $("#exampleModal").modal('show');

            var test = $('#cemetery_noz').val(number)
            console.log(test)

            if (number <= 61) {
                $('#block_no').val('1')
                $('#block_noz').val('1')
            } else if (number > 61 && number < 141) {
                $('#block_no').val('2')
                $('#block_noz').val('2')
            } else if (number > 140 && number < 235) {
                $('#block_no').val('3')
                $('#block_noz').val('3')
            } else if (number > 234 && number < 289) {
                $('#block_no').val('4')
                $('#block_noz').val('4')
            } else if (number > 288 && number < 376) {
                $('#block_no').val('5')
                $('#block_noz').val('5')
            } else {
                $('#block_no').val('6')
                $('#block_noz').val('6')
            }
        }
    }

    function edit(number) {
        console.log(number)
        $("#editModal").modal('show');
        $.ajax({
            url : "/edit/"+number,
            type: "GET",
            data: { cemetery_no: number },
            success: function(response) {
                var borndate = response.born_date.split(' ')[0];
                var diedate = response.die_date.split(' ')[0];
                $('#no2').text(number);
                $('#fname').val(response.first_name);
                $('#lname').val(response.last_name);
                $('#mname').val(response.middle_name);
                $('#selected').text(response.type_of_lot);
                $('#bdate').val(borndate);
                $('#ddate').val(diedate);
                $('#cemetery_no1').val(number);
            }
        });
    }
</script>
<style>
    @media screen and (max-width: 1700px) {
    .occupied  {
        background-color: red !important;
        color: white !important;
    }
    .occupied:hover {
        background-color: red !important;
    }
    .reserve {
        background-color: yellow !important;
        color: white !important;
    }
    .reserve:hover {
        background-color: yellow !important;
    }
    .reserve-admin {
        background-color: blue !important;
        color: white !important;
    }
    .reserve-admin:hover {
        background-color: blue !important;
    }
    #box {
        width: 30px;
        height: 30px;
        border: 1px solid grey;
        border-radius: 6px;
        background-color: #f4f4f4;
        color: grey;
    }
    #boxs {
        width: 30px;
        height: 30px;
        border: 1px solid black;
        border-radius: 5px;
    }
    #box:hover {
        background-color: #7abacf;
    }
    #status {
        color: #ffc700;
    }
    .container {
        justify-content: center;
    }
    #background {
        background-image: url("/assets/2.jpeg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

        /* background-color: #66b567;   */
    }
    #one {
        position: absolute;
        left: 280px;
        z-index: 1;
        font-size: 100px;
        color: #64658278;
    }     
    #two {
        position: absolute;
        left: 580px;
        z-index: 1;
        font-size: 100px;
        color: #64658278;
    }     
    #three {
        position: absolute;
        left: 940px;
        z-index: 100;
        font-size: 100px;
        color: #64658278;
    }
    #four {
        position: absolute;
        left: 280px;
        z-index: 100;
        font-size: 100px;
        color: #64658278;
    }
    #five {
        position: absolute;
        left: 580px;
        z-index: 100;
        font-size: 100px;
        color: #64658278;
    }
    #six {
        position: absolute;
        left: 940px;
        z-index: 100;
        font-size: 100px;
        color: #64658278;
    }
    .none {
        display: none;
    }
    div.dataTables_wrapper div.dataTables_length select {
        width: 60px;
    }
    }
 
</style>
</html>