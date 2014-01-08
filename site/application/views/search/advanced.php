<div class="row">
	<div class="span8">
		<div id="sConNew">
			<form name="search" id="search" method="get">
			<div id="sOptCon">
				<!-- OPTIONS - Keyword -->
				<div class="optSec" id="optKeyword">
					<div class="optHead">
						<h3 title="job search using keyword">Kata Kunci 
						<a href="#area" target="_blank" title="Tips Pencarian Lowongan @ JobStreet.com" class="popWin">?</a></h3>
						<span class="ins">- Sebuah kata atau frase yang sesuai dengan lowongan yang sesuai..</span>
					</div>
					<div class="optBody" style="padding-right: 0px;">
						<div id="optKeyCon">
							<div class="menu-section">
								<div class="menu-left">
									<div class="yui-skin-sam">
										<div id="myAutoComplete">
											<input class="iptKey text ac_input" type="text" id="key" name="key" maxlength="100" value="" title="Masukkan judul lowongan, nama perusahaan, keahlian, dll" autosuggest="on" autocomplete="off" />
											<div id="keySuggestContainer"></div>
										</div>
									</div>
								</div>
								<div class="menu-right">
									<input class="btnQsSearch" type="submit" id="btnSubmit" title="Cari Lowongan Sekarang" value="Cari Lowongan" />
								</div>
								<div class="cf"></div>
							</div>
						</div>
						<div id="qsKeyArea">Cari di 
						<input type="radio" id="area1" value="1" name="area" onclick="updateCaption($(this));" checked="checked" />
						<label for="area1" style="cursor:pointer;" title="Mencari untuk seluruh iklan lowongan">Seluruh iklan lowongan</label>
						<input type="radio" id="area2" value="2" name="area" onclick="updateCaption($(this));" />
						<label for="area2" style="cursor:pointer;" title="Mencari untuk judul lowongan">Judul lowongan</label>
						<input type="radio" id="area3" value="3" name="area" onclick="updateCaption($(this));" />
						<label for="area3" style="cursor:pointer;" title="Mencari untuk nama perusahaan">Nama perusahaan</label></div>
					</div>
				</div>
				<!-- OPTIONS - State -->
				<div class="optSec" id="optLoc">
					<div class="optHead">
						<h3 title="job search using location">Lokasi</h3>
						<span class="ins">- Di manakah Anda ingin bekerja</span>
					</div>
					<div class="optBody">
						<div id="tbLocOpen" class="btnPopup" title="Silakan pilih Lokasi">
							<div class="btnPopupText">Silakan pilih Lokasi</div>
							<div class="btnPopupBtn"></div>
							<div class="cf"></div>
						</div>
						<div class="cf"></div>
						<div class="thickbox-hidden" id="optLocCon">
							<div class="tbLocCon">
								<div style="height:350px;" class="listwrap" id="optLocLeft">
								<span class="ulgroup">Indonesian</span>   
								<span class="link" id="selectState">Semua</span> |  
								<span id="deselectState" class="link">Tidak Ada</span>
								<div class="enter"></div>
								<div id="optLocState">
									<div class="half">
										<ul>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30100" value="30100" alt="Aceh" />
												<label for="location30100">Aceh</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30200" value="30200" alt="Bali" />
												<label for="location30200">Bali</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32800" value="32800" alt="Bangka Belitung" />
												<label for="location32800">Bangka Belitung</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32900" value="32900" alt="Banten" />
												<label for="location32900">Banten</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30300" value="30300" alt="Bengkulu" />
												<label for="location30300">Bengkulu</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location33000" value="33000" alt="Gorontalo" />
												<label for="location33000">Gorontalo</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30500" value="30500" alt="Jakarta Raya" />
												<label for="location30500">Jakarta Raya</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30600" value="30600" alt="Jambi" />
												<label for="location30600">Jambi</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30700" value="30700" alt="Jawa Barat" />
												<label for="location30700">Jawa Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30800" value="30800" alt="Jawa Tengah" />
												<label for="location30800">Jawa Tengah</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30900" value="30900" alt="Jawa Timur" />
												<label for="location30900">Jawa Timur</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31000" value="31000" alt="Kalimantan Barat" />
												<label for="location31000">Kalimantan Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31100" value="31100" alt="Kalimantan Selatan" />
												<label for="location31100">Kalimantan Selatan</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31200" value="31200" alt="Kalimantan Tengah" />
												<label for="location31200">Kalimantan Tengah</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31300" value="31300" alt="Kalimantan Timur" />
												<label for="location31300">Kalimantan Timur</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location33200" value="33200" alt="Kepulauan Riau" />
												<label for="location33200">Kepulauan Riau</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31400" value="31400" alt="Lampung" />
												<label for="location31400">Lampung</label>
											</li>
										</ul>
									</div>
									<!--halfway mark-->
									<div class="half">
										<ul>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31500" value="31500" alt="Maluku" />
												<label for="location31500">Maluku</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location33100" value="33100" alt="Maluku Utara" />
												<label for="location33100">Maluku Utara</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31600" value="31600" alt="Nusa Tenggara Barat" />
												<label for="location31600">Nusa Tenggara Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31700" value="31700" alt="Nusa Tenggara Timur" />
												<label for="location31700">Nusa Tenggara Timur</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location30400" value="30400" alt="Papua" />
												<label for="location30400">Papua</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location33300" value="33300" alt="Papua Barat" />
												<label for="location33300">Papua Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31800" value="31800" alt="Riau" />
												<label for="location31800">Riau</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location33400" value="33400" alt="Sulawesi Barat" />
												<label for="location33400">Sulawesi Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location31900" value="31900" alt="Sulawesi Selatan" />
												<label for="location31900">Sulawesi Selatan</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32000" value="32000" alt="Sulawesi Tengah" />
												<label for="location32000">Sulawesi Tengah</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32100" value="32100" alt="Sulawesi Tenggara" />
												<label for="location32100">Sulawesi Tenggara</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32200" value="32200" alt="Sulawesi Utara" />
												<label for="location32200">Sulawesi Utara</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32300" value="32300" alt="Sumatera Barat" />
												<label for="location32300">Sumatera Barat</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32400" value="32400" alt="Sumatera Selatan" />
												<label for="location32400">Sumatera Selatan</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32500" value="32500" alt="Sumatera Utara" />
												<label for="location32500">Sumatera Utara</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location32700" value="32700" alt="Yogyakarta" />
												<label for="location32700">Yogyakarta</label>
											</li>
										</ul>
									</div>
								</div>
								<div class="cf" style="padding-top: 10px; margin-top:10px; border-top:1px solid #ccc;"></div>
								<span class="ulgroup">Lokasi di Luar Negeri</span>   
								<span class="link" id="selectOversea">Semua</span> |  
								<span id="deselectOversea" class="link">Tidak Ada</span>
								<div class="enter"></div>
								<div id="optLocRight">
									<div class="half">
										<ul>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location60000" value="60000" alt="Filipina" />
												<label for="location60000">Filipina</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location20000" value="20000" alt="Hongkong" />
												<label for="location20000">Hongkong</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location40000" value="40000" alt="India" />
												<label for="location40000">India</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location150000" value="150000" alt="Jepang" />
												<label for="location150000">Jepang</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location50000" value="50000" alt="Malaysia" />
												<label for="location50000">Malaysia</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location70000" value="70000" alt="Singapura" />
												<label for="location70000">Singapura</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location80000" value="80000" alt="Thailand" />
												<label for="location80000">Thailand</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location100000" value="100000" alt="Tiongkok " />
												<label for="location100000">Tiongkok</label>
											</li>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location110000" value="110000" alt="Vietnam" />
												<label for="location110000">Vietnam</label>
											</li>
										</ul>
									</div>
									<div class="half">
										<ul>
											<li class="l2 cf labelNormal">
												<input type="checkbox" name="location[]" id="location90100" value="90100" alt="Lokasi kerja yang lain" />
												<label for="location90100">Lokasi kerja yang lain</label>
												<ul>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90110" value="90110" alt="Afrika" />
														<label for="location90110">Afrika</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90120" value="90120" alt="Asia – Timur Tengah" />
														<label for="location90120">Asia – Timur Tengah</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90130" value="90130" alt="Asia – lainnya" />
														<label for="location90130">Asia – lainnya</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90140" value="90140" alt="Australia &amp; Selandia Baru" />
														<label for="location90140">Australia &amp; Selandia Baru</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90150" value="90150" alt="Eropa" />
														<label for="location90150">Eropa</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90160" value="90160" alt="Amerika Utara" />
														<label for="location90160">Amerika Utara</label>
													</li>
													<li class="l3 cf labelNormal">
														<input type="checkbox" name="location[]" id="location90170" value="90170" alt="Amerika Selatan" />
														<label for="location90170">Amerika Selatan</label>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</div></div>
								<div class="menu-section">
									<div class="menu-left">
										<span id="linkClearLoc" class="link">Bersihkan pilihan</span>
									</div>
									<div class="menu-right">
									<input id="locConBtn" type="button" class="btnQsSearch" value="Konfirm" />   
									<input type="button" class="btnQsSearch thickbutton-remove btnCancel" value="Batalkan" /></div>
									<div class="cf"></div>
								</div>
								<div class="enter"></div>
							</div>
						</div>
						<div class="optConSel" id="locationSel"></div>
					</div>
				</div>
				<!-- OPTIONS - SPECIALIZATION -->
				<div class="optSec" id="optSpe">
					<div class="optHead">
						<h3 title="job search using specialization">Spesialisasi</h3>
						<span class="ins">- Apa fungsi spesifik atau kemahiran dari lowongan yang Anda inginkan?</span>
					</div>
					<div class="optBody">
						<div id="tbSpeOpen" class="btnPopup" title="Silakan pilih Spesialisasi">
							<div class="btnPopupText">Silakan pilih Spesialisasi</div>
							<div class="btnPopupBtn"></div>
							<div class="cf"></div>
						</div>
						<div class="cf"></div>
						<div id="optSpeCon" class="thickbox-hidden">
							<div style="height:350px;" class="listwrap">
								<div class="half">
									<ul>
										<li>
											<div class="ulgroup">Akuntansi/Keuangan</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;130&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="130" id="specialization130" alt="Audit &amp; Pajak" />
											<label for="specialization130">Audit &amp; Pajak</label>
											<ul id="optSpeRole130" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1143" id="role1143_130" alt="Auditing" />
													<label for="role1143_130">Auditing</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1125" id="role1125_130" alt="Dalam Pengawasan Kurator/Likuidasi" />
													<label for="role1125_130">Dalam Pengawasan Kurator/Likuidasi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1145" id="role1145_130" alt="Manajemen" />
													<label for="role1145_130">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1144" id="role1144_130" alt="Perpajakan" />
													<label for="role1144_130">Perpajakan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1146" id="role1146_130" alt="Lainnya" />
													<label for="role1146_130">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;135&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="135" id="specialization135" alt="Perbankan/Keuangan" />
											<label for="specialization135">Perbankan/Keuangan</label>
											<ul id="optSpeRole135" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1159" id="role1159_135" alt="Analis " />
													<label for="role1159_135">Analis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1157" id="role1157_135" alt="Audit Internal" />
													<label for="role1157_135">Audit Internal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1158" id="role1158_135" alt="Ekonom" />
													<label for="role1158_135">Ekonom</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1152" id="role1152_135" alt="Klaim/Penyelesaian" />
													<label for="role1152_135">Klaim/Penyelesaian</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1148" id="role1148_135" alt="Korporasi Perbankan" />
													<label for="role1148_135">Korporasi Perbankan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1161" id="role1161_135" alt="Manajemen" />
													<label for="role1161_135">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1149" id="role1149_135" alt="Manajemen Bendahara" />
													<label for="role1149_135">Manajemen Bendahara</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1154" id="role1154_135" alt="Manajemen Kredit" />
													<label for="role1154_135">Manajemen Kredit</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1153" id="role1153_135" alt="Manajemen Risiko" />
													<label for="role1153_135">Manajemen Risiko</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1151" id="role1151_135" alt="Pengaturan Keuangan/Manajemen Kekayaan" />
													<label for="role1151_135">Pengaturan Keuangan/Manajemen Kekayaan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1155" id="role1155_135" alt="Penjamin (Asuransi)" />
													<label for="role1155_135">Penjamin (Asuransi)</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1150" id="role1150_135" alt="Peraturan Komplians" />
													<label for="role1150_135">Peraturan Komplians</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1147" id="role1147_135" alt="Perbankan/Operasi Cabang Retail" />
													<label for="role1147_135">Perbankan/Operasi Cabang Retail</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1160" id="role1160_135" alt="Pinjaman/Hipotek" />
													<label for="role1160_135">Pinjaman/Hipotek</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1162" id="role1162_135" alt="Lainnya" />
													<label for="role1162_135">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;132&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="132" id="specialization132" alt="Keuangan/Investasi" />
											<label for="specialization132">Keuangan/Investasi</label>
											<ul id="optSpeRole132" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1138" id="role1138_132" alt="Analisa Ekuitas/Saham" />
													<label for="role1138_132">Analisa Ekuitas/Saham</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1131" id="role1131_132" alt="Bendahara/Keuangan Korporasi" />
													<label for="role1131_132">Bendahara/Keuangan Korporasi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1133" id="role1133_132" alt="Hubungan Investor" />
													<label for="role1133_132">Hubungan Investor</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1136" id="role1136_132" alt="Investasi Perbankan" />
													<label for="role1136_132">Investasi Perbankan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1139" id="role1139_132" alt="Jual Beli Saham" />
													<label for="role1139_132">Jual Beli Saham</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1141" id="role1141_132" alt="Manajemen" />
													<label for="role1141_132">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1134" id="role1134_132" alt="Manajemen Risiko Perusahaan" />
													<label for="role1134_132">Manajemen Risiko Perusahaan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1137" id="role1137_132" alt="Manajemen/Investasi Dana" />
													<label for="role1137_132">Manajemen/Investasi Dana</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1060" id="role1060_132" alt="Sekretaris Perusahaan" />
													<label for="role1060_132">Sekretaris Perusahaan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1142" id="role1142_132" alt="Lainnya" />
													<label for="role1142_132">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;131&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="131" id="specialization131" alt="Akuntansi Umum/Pembiayaan" />
											<label for="specialization131">Akuntansi Umum/Pembiayaan</label>
											<ul id="optSpeRole131" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1126" id="role1126_131" alt="Akuntansi &amp; Laporan Keuangan" />
													<label for="role1126_131">Akuntansi &amp; Laporan Keuangan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1124" id="role1124_131" alt="Akuntansi Dasar/Pembukuan/Eksekutif Akun" />
													<label for="role1124_131">Akuntansi Dasar/Pembukuan/Eksekutif Akun</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1129" id="role1129_131" alt="Manajemen" />
													<label for="role1129_131">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1127" id="role1127_131" alt="Manajemen/Akuntansi Biaya/Analis Bisnis" />
													<label for="role1127_131">Manajemen/Akuntansi Biaya/Analis Bisnis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1130" id="role1130_131" alt="Lainnya" />
													<label for="role1130_131">Lainnya</label>
												</li>
											</ul>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Adminstrasi/Personalia</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="133" id="specialization133" alt="Staf/Administrasi umum" />
											<label for="specialization133">Staf/Administrasi umum</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="137" id="specialization137" alt="Personalia" />
											<label for="specialization137">Personalia</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="146" id="specialization146" alt="Sekretaris" />
											<label for="specialization146">Sekretaris</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="148" id="specialization148" alt="Manajemen Atas" />
											<label for="specialization148">Manajemen Atas</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Seni/Media/Komunikasi</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;100&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="100" id="specialization100" alt="Periklanan" />
											<label for="specialization100">Periklanan</label>
											<ul id="optSpeRole100" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1347" id="role1347_100" alt="Eksekutif Periklanan/Manajer Akun" />
													<label for="role1347_100">Eksekutif Periklanan/Manajer Akun</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1351" id="role1351_100" alt="Konsultan" />
													<label for="role1351_100">Konsultan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1349" id="role1349_100" alt="Kreati" />
													<label for="role1349_100">Kreati</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1353" id="role1353_100" alt="Manajemen" />
													<label for="role1353_100">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1348" id="role1348_100" alt="Penulis Cetak" />
													<label for="role1348_100">Penulis Cetak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1350" id="role1350_100" alt="Perencanaan Media" />
													<label for="role1350_100">Perencanaan Media</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1352" id="role1352_100" alt="Supervisor/Pemimpin Tim" />
													<label for="role1352_100">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1354" id="role1354_100" alt="Lainnya" />
													<label for="role1354_100">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;101&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="101" id="specialization101" alt="Seni/Desain Kreatif" />
											<label for="specialization101">Seni/Desain Kreatif</label>
											<ul id="optSpeRole101" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1047" id="role1047_101" alt="Animator" />
													<label for="role1047_101">Animator</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1048" id="role1048_101" alt="Artis Desktop Publishing" />
													<label for="role1048_101">Artis Desktop Publishing</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1044" id="role1044_101" alt="Desain Grafis" />
													<label for="role1044_101">Desain Grafis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1045" id="role1045_101" alt="Desain Multimedia" />
													<label for="role1045_101">Desain Multimedia</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1046" id="role1046_101" alt="Desain Web" />
													<label for="role1046_101">Desain Web</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1051" id="role1051_101" alt="Desainer Bunga" />
													<label for="role1051_101">Desainer Bunga</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1052" id="role1052_101" alt="Desainer Industri/Produk" />
													<label for="role1052_101">Desainer Industri/Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1050" id="role1050_101" alt="Fotografer" />
													<label for="role1050_101">Fotografer</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1054" id="role1054_101" alt="Konseptor Desain" />
													<label for="role1054_101">Konseptor Desain</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1056" id="role1056_101" alt="Manajemen" />
													<label for="role1056_101">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1049" id="role1049_101" alt="Perancang Busana" />
													<label for="role1049_101">Perancang Busana</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1055" id="role1055_101" alt="Supervisor/Pemimpin Tim" />
													<label for="role1055_101">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1053" id="role1053_101" alt="Visual Merchandiser" />
													<label for="role1053_101">Visual Merchandiser</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1057" id="role1057_101" alt="Lainnya" />
													<label for="role1057_101">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="106" id="specialization106" alt="Hiburan/Seni Panggung" />
											<label for="specialization106">Hiburan/Seni Panggung</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="141" id="specialization141" alt="Hubungan Masyarakat" />
											<label for="specialization141">Hubungan Masyarakat</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Bangunan/Konstruksi</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="180" id="specialization180" alt="Arsitek/Desain Interior" />
											<label for="specialization180">Arsitek/Desain Interior</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;184&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="184" id="specialization184" alt="Sipil/Konstruksi Bangunan" />
											<label for="specialization184">Sipil/Konstruksi Bangunan</label>
											<ul id="optSpeRole184" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1209" id="role1209_184" alt="Konseptor Sipil/Struktural" />
													<label for="role1209_184">Konseptor Sipil/Struktural</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1217" id="role1217_184" alt="Manajemen" />
													<label for="role1217_184">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1211" id="role1211_184" alt="Manajemen Kontrak" />
													<label for="role1211_184">Manajemen Kontrak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1214" id="role1214_184" alt="Mandor/Teknisi" />
													<label for="role1214_184">Mandor/Teknisi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1212" id="role1212_184" alt="Pegawai Kerja/Supervisor Situs" />
													<label for="role1212_184">Pegawai Kerja/Supervisor Situs</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1210" id="role1210_184" alt="Pensurvei Tanah" />
													<label for="role1210_184">Pensurvei Tanah</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1216" id="role1216_184" alt="Project Management" />
													<label for="role1216_184">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1213" id="role1213_184" alt="QC/QA" />
													<label for="role1213_184">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1215" id="role1215_184" alt="Supervisor/Pemimpin Tim" />
													<label for="role1215_184">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1208" id="role1208_184" alt="Teknisi Lingkungan, Kesehatan &amp; Keamanan" />
													<label for="role1208_184">Teknisi Lingkungan, Kesehatan &amp; Keamanan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1205" id="role1205_184" alt="Teknisi Sipil" />
													<label for="role1205_184">Teknisi Sipil</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1207" id="role1207_184" alt="Teknisi Situs" />
													<label for="role1207_184">Teknisi Situs</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1206" id="role1206_184" alt="Teknisi Struktural" />
													<label for="role1206_184">Teknisi Struktural</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1218" id="role1218_184" alt="Lainnya" />
													<label for="role1218_184">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;150&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="150" id="specialization150" alt="Properti/Real Estate" />
											<label for="specialization150">Properti/Real Estate</label>
											<ul id="optSpeRole150" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1500" id="role1500_150" alt="Ahli Negosiasi Real Estate" />
													<label for="role1500_150">Ahli Negosiasi Real Estate</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1506" id="role1506_150" alt="Analis/Konsultan" />
													<label for="role1506_150">Analis/Konsultan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1507" id="role1507_150" alt="Manajemen" />
													<label for="role1507_150">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1504" id="role1504_150" alt="Manajemen Properti" />
													<label for="role1504_150">Manajemen Properti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1505" id="role1505_150" alt="Pengembangan Properti" />
													<label for="role1505_150">Pengembangan Properti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1501" id="role1501_150" alt="Penilai Properti" />
													<label for="role1501_150">Penilai Properti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1503" id="role1503_150" alt="Penjualan Properti" />
													<label for="role1503_150">Penjualan Properti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1502" id="role1502_150" alt="Persewaan Properti" />
													<label for="role1502_150">Persewaan Properti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1508" id="role1508_150" alt="Lainnya" />
													<label for="role1508_150">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="198" id="specialization198" alt="Survei Kuantitas" />
											<label for="specialization198">Survei Kuantitas</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Komputer/IT</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="192" id="specialization192" alt="IT-Perangkat Keras" />
											<label for="specialization192">IT-Perangkat Keras</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;193&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="193" id="specialization193" alt="IT-Jaringan/Sistem/Sistem Database" />
											<label for="specialization193">IT-Jaringan/Sistem/Sistem Database</label>
											<ul id="optSpeRole193" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1019" id="role1019_193" alt="Administrator Database" />
													<label for="role1019_193">Administrator Database</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1017" id="role1017_193" alt="Administrator Sistem" />
													<label for="role1017_193">Administrator Sistem</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1023" id="role1023_193" alt="Auditor IT" />
													<label for="role1023_193">Auditor IT</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1026" id="role1026_193" alt="Eksekutif/MIS IT" />
													<label for="role1026_193">Eksekutif/MIS IT</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1020" id="role1020_193" alt="Keamanan Infrastruktur" />
													<label for="role1020_193">Keamanan Infrastruktur</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1030" id="role1030_193" alt="Manajemen" />
													<label for="role1030_193">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1029" id="role1029_193" alt="Manajemen Produk" />
													<label for="role1029_193">Manajemen Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1021" id="role1021_193" alt="Pelatih IT" />
													<label for="role1021_193">Pelatih IT</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1024" id="role1024_193" alt="Penulis Teknis" />
													<label for="role1024_193">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1028" id="role1028_193" alt="Project Management" />
													<label for="role1028_193">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1022" id="role1022_193" alt="QC/QA" />
													<label for="role1022_193">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1027" id="role1027_193" alt="Supervisor/Pemimpin Tim" />
													<label for="role1027_193">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1016" id="role1016_193" alt="Teknisi Network/Sistem" />
													<label for="role1016_193">Teknisi Network/Sistem</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1031" id="role1031_193" alt="Lainnya" />
													<label for="role1031_193">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;191&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="191" id="specialization191" alt="IT-Perangkat Lunak" />
											<label for="specialization191">IT-Perangkat Lunak</label>
											<ul id="optSpeRole191" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1001" id="role1001_191" alt="Analisa Sistem" />
													<label for="role1001_191">Analisa Sistem</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1002" id="role1002_191" alt="Arsitek Perangkat Lunak" />
													<label for="role1002_191">Arsitek Perangkat Lunak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1008" id="role1008_191" alt="Auditor IT" />
													<label for="role1008_191">Auditor IT</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1007" id="role1007_191" alt="Keamanan Perangkat Lunak" />
													<label for="role1007_191">Keamanan Perangkat Lunak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1003" id="role1003_191" alt="Konsultan Fungsi/Analis Bisnis" />
													<label for="role1003_191">Konsultan Fungsi/Analis Bisnis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1014" id="role1014_191" alt="Manajemen" />
													<label for="role1014_191">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1013" id="role1013_191" alt="Manajemen Produk" />
													<label for="role1013_191">Manajemen Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1009" id="role1009_191" alt="Pelatih Perangkat Lunak/Aplikasi" />
													<label for="role1009_191">Pelatih Perangkat Lunak/Aplikasi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1010" id="role1010_191" alt="Peneliti" />
													<label for="role1010_191">Peneliti</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1006" id="role1006_191" alt="Penulis Teknis" />
													<label for="role1006_191">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1012" id="role1012_191" alt="Project Management" />
													<label for="role1012_191">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1005" id="role1005_191" alt="QA Perangkat Lunak" />
													<label for="role1005_191">QA Perangkat Lunak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1011" id="role1011_191" alt="Supervisor/Pemimpin Tim" />
													<label for="role1011_191">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1000" id="role1000_191" alt="Teknisi/Programer Perangkat Lunak" />
													<label for="role1000_191">Teknisi/Programer Perangkat Lunak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1015" id="role1015_191" alt="Lainnya" />
													<label for="role1015_191">Lainnya</label>
												</li>
											</ul>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Pendidikan/Pelatihan</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;105&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="105" id="specialization105" alt="Pendidikan" />
											<label for="specialization105">Pendidikan</label>
											<ul id="optSpeRole105" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1374" id="role1374_105" alt="Dosen" />
													<label for="role1374_105">Dosen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1375" id="role1375_105" alt="Guru Besar" />
													<label for="role1375_105">Guru Besar</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1372" id="role1372_105" alt="Guru SD" />
													<label for="role1372_105">Guru SD</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1371" id="role1371_105" alt="Guru TK" />
													<label for="role1371_105">Guru TK</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1373" id="role1373_105" alt="Kepala Sekolah" />
													<label for="role1373_105">Kepala Sekolah</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1378" id="role1378_105" alt="Konselor Pendidikan" />
													<label for="role1378_105">Konselor Pendidikan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1380" id="role1380_105" alt="Manajemen" />
													<label for="role1380_105">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1370" id="role1370_105" alt="Penitipan Anak" />
													<label for="role1370_105">Penitipan Anak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1377" id="role1377_105" alt="Perancang Instruksi" />
													<label for="role1377_105">Perancang Instruksi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1379" id="role1379_105" alt="Periset" />
													<label for="role1379_105">Periset</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1376" id="role1376_105" alt="Pustakawan" />
													<label for="role1376_105">Pustakawan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1381" id="role1381_105" alt="Lainnya" />
													<label for="role1381_105">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="121" id="specialization121" alt="Penelitian &amp; Pengembangan" />
											<label for="specialization121">Penelitian &amp; Pengembangan</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Teknik</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="185" id="specialization185" alt="Teknik Kimia" />
											<label for="specialization185">Teknik Kimia</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;187&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="187" id="specialization187" alt="Teknik Elektrikal" />
											<label for="specialization187">Teknik Elektrikal</label>
											<ul id="optSpeRole187" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1229" id="role1229_187" alt="CAD-CAM/Konseptor Elektrikal" />
													<label for="role1229_187">CAD-CAM/Konseptor Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1239" id="role1239_187" alt="Manajemen" />
													<label for="role1239_187">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1237" id="role1237_187" alt="Manajemen Produk" />
													<label for="role1237_187">Manajemen Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1233" id="role1233_187" alt="Penulis Teknis" />
													<label for="role1233_187">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1238" id="role1238_187" alt="Project Management" />
													<label for="role1238_187">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1230" id="role1230_187" alt="QC/QA" />
													<label for="role1230_187">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1236" id="role1236_187" alt="Supervisor/Pemimpin Tim" />
													<label for="role1236_187">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1226" id="role1226_187" alt="Teknisi Elektrikal" />
													<label for="role1226_187">Teknisi Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1228" id="role1228_187" alt="Teknisi Pengetesan" />
													<label for="role1228_187">Teknisi Pengetesan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1227" id="role1227_187" alt="Teknisi Proses" />
													<label for="role1227_187">Teknisi Proses</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1232" id="role1232_187" alt="Teknisi R&amp;D" />
													<label for="role1232_187">Teknisi R&amp;D</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1231" id="role1231_187" alt="Teknisi/Pendukung Elektrikal" />
													<label for="role1231_187">Teknisi/Pendukung Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1240" id="role1240_187" alt="Lainnya" />
													<label for="role1240_187">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;186&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="186" id="specialization186" alt="Teknik Elektro" />
											<label for="specialization186">Teknik Elektro</label>
											<ul id="optSpeRole186" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1246" id="role1246_186" alt="CAD-CAM/Konseptor Elektrikal" />
													<label for="role1246_186">CAD-CAM/Konseptor Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1256" id="role1256_186" alt="Manajemen" />
													<label for="role1256_186">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1254" id="role1254_186" alt="Manajemen Produk" />
													<label for="role1254_186">Manajemen Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1250" id="role1250_186" alt="Penulis Teknis" />
													<label for="role1250_186">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1255" id="role1255_186" alt="Project Management" />
													<label for="role1255_186">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1247" id="role1247_186" alt="QC/QA" />
													<label for="role1247_186">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1253" id="role1253_186" alt="Supervisor/Pemimpin Tim" />
													<label for="role1253_186">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1241" id="role1241_186" alt="Teknisi Elektronik" />
													<label for="role1241_186">Teknisi Elektronik</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1245" id="role1245_186" alt="Teknisi Pengetesan" />
													<label for="role1245_186">Teknisi Pengetesan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1244" id="role1244_186" alt="Teknisi Proses" />
													<label for="role1244_186">Teknisi Proses</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1249" id="role1249_186" alt="Teknisi R&amp;D" />
													<label for="role1249_186">Teknisi R&amp;D</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1242" id="role1242_186" alt="Teknisi SMT" />
													<label for="role1242_186">Teknisi SMT</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1243" id="role1243_186" alt="Teknisi Telekomunikasi" />
													<label for="role1243_186">Teknisi Telekomunikasi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1248" id="role1248_186" alt="Teknisi/Pendukung Elektrikal" />
													<label for="role1248_186">Teknisi/Pendukung Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1257" id="role1257_186" alt="Lainnya" />
													<label for="role1257_186">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="189" id="specialization189" alt="Teknik Lingkungan" />
											<label for="specialization189">Teknik Lingkungan</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="200" id="specialization200" alt="Teknik" />
											<label for="specialization200">Teknik</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;195&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="195" id="specialization195" alt="Mekanik/Otomotif" />
											<label for="specialization195">Mekanik/Otomotif</label>
											<ul id="optSpeRole195" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1265" id="role1265_195" alt="CAD-CAM/Konseptor Elektrikal" />
													<label for="role1265_195">CAD-CAM/Konseptor Elektrikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1274" id="role1274_195" alt="Manajemen" />
													<label for="role1274_195">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1272" id="role1272_195" alt="Manajemen Produk" />
													<label for="role1272_195">Manajemen Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1269" id="role1269_195" alt="Penulis Teknis" />
													<label for="role1269_195">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1273" id="role1273_195" alt="Project Management" />
													<label for="role1273_195">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1266" id="role1266_195" alt="QC/QA" />
													<label for="role1266_195">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1271" id="role1271_195" alt="Supervisor/Pemimpin Tim" />
													<label for="role1271_195">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1261" id="role1261_195" alt="Teknisi Mekanikal" />
													<label for="role1261_195">Teknisi Mekanikal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1262" id="role1262_195" alt="Teknisi Otomotif" />
													<label for="role1262_195">Teknisi Otomotif</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1264" id="role1264_195" alt="Teknisi Pengetesan" />
													<label for="role1264_195">Teknisi Pengetesan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1263" id="role1263_195" alt="Teknisi Proses" />
													<label for="role1263_195">Teknisi Proses</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1268" id="role1268_195" alt="Teknisi R&amp;D" />
													<label for="role1268_195">Teknisi R&amp;D</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1267" id="role1267_195" alt="Teknisi/Pendukung " />
													<label for="role1267_195">Teknisi/Pendukung</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1275" id="role1275_195" alt="Lainnya" />
													<label for="role1275_195">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;190&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="190" id="specialization190" alt="Teknik Perminyakan" />
											<label for="specialization190">Teknik Perminyakan</label>
											<ul id="optSpeRole190" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1319" id="role1319_190" alt="CAD-CAM/Konseptor" />
													<label for="role1319_190">CAD-CAM/Konseptor</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1327" id="role1327_190" alt="Manajemen" />
													<label for="role1327_190">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1324" id="role1324_190" alt="Penulis Teknis" />
													<label for="role1324_190">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1326" id="role1326_190" alt="Project Management" />
													<label for="role1326_190">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1321" id="role1321_190" alt="QC/QA" />
													<label for="role1321_190">QC/QA</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1325" id="role1325_190" alt="Supervisor/Pemimpin Tim" />
													<label for="role1325_190">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1316" id="role1316_190" alt="Teknisi Fasilitas" />
													<label for="role1316_190">Teknisi Fasilitas</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1315" id="role1315_190" alt="Teknisi Pengeboran/Sumur" />
													<label for="role1315_190">Teknisi Pengeboran/Sumur</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1318" id="role1318_190" alt="Teknisi Produksi" />
													<label for="role1318_190">Teknisi Produksi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1317" id="role1317_190" alt="Teknisi Proses" />
													<label for="role1317_190">Teknisi Proses</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1322" id="role1322_190" alt="Teknisi R&amp;D" />
													<label for="role1322_190">Teknisi R&amp;D</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1314" id="role1314_190" alt="Teknisi Waduk/Petroleum" />
													<label for="role1314_190">Teknisi Waduk/Petroleum</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1320" id="role1320_190" alt="Teknisi/Pendukung" />
													<label for="role1320_190">Teknisi/Pendukung</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1328" id="role1328_190" alt="Lainnya" />
													<label for="role1328_190">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="188" id="specialization188" alt="Teknik Lainnya" />
											<label for="specialization188">Teknik Lainnya</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Kesehatan</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="113" id="specialization113" alt="Dokter/Diagnosa" />
											<label for="specialization113">Dokter/Diagnosa</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="112" id="specialization112" alt="Farmasi" />
											<label for="specialization112">Farmasi</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;111&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="111" id="specialization111" alt="Praktisi/Asisten Medis" />
											<label for="specialization111">Praktisi/Asisten Medis</label>
											<ul id="optSpeRole111" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1186" id="role1186_111" alt="Ahli Fisioterapi" />
													<label for="role1186_111">Ahli Fisioterapi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1185" id="role1185_111" alt="Ahli Kacamata" />
													<label for="role1185_111">Ahli Kacamata</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1182" id="role1182_111" alt="Ahli Patologi" />
													<label for="role1182_111">Ahli Patologi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1183" id="role1183_111" alt="Ahli Radiografi" />
													<label for="role1183_111">Ahli Radiografi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1184" id="role1184_111" alt="Ahli Sonografi" />
													<label for="role1184_111">Ahli Sonografi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1187" id="role1187_111" alt="Ahli Terapi Lainnya" />
													<label for="role1187_111">Ahli Terapi Lainnya</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1179" id="role1179_111" alt="Asisten/Teknisi Lab Klinis" />
													<label for="role1179_111">Asisten/Teknisi Lab Klinis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1176" id="role1176_111" alt="Juru Bidan" />
													<label for="role1176_111">Juru Bidan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1178" id="role1178_111" alt="Juru Tulis Medis" />
													<label for="role1178_111">Juru Tulis Medis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1181" id="role1181_111" alt="Kiropraktor" />
													<label for="role1181_111">Kiropraktor</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1189" id="role1189_111" alt="Manajemen" />
													<label for="role1189_111">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1188" id="role1188_111" alt="Pengetes Medis" />
													<label for="role1188_111">Pengetes Medis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1180" id="role1180_111" alt="Periset Medis/klinis" />
													<label for="role1180_111">Periset Medis/klinis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1177" id="role1177_111" alt="Petugas Medis/ Paramedis" />
													<label for="role1177_111">Petugas Medis/ Paramedis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1175" id="role1175_111" alt="Suster" />
													<label for="role1175_111">Suster</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1190" id="role1190_111" alt="lainnya " />
													<label for="role1190_111">lainnya</label>
												</li>
											</ul>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Hotel/Restoran</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;107&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="107" id="specialization107" alt="Makanan/Minuman/Pelayanan Restoran" />
											<label for="specialization107">Makanan/Minuman/Pelayanan Restoran</label>
											<ul id="optSpeRole107" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1395" id="role1395_107" alt="Bartender" />
													<label for="role1395_107">Bartender</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1392" id="role1392_107" alt="Koki" />
													<label for="role1392_107">Koki</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1397" id="role1397_107" alt="Manajemen" />
													<label for="role1397_107">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1394" id="role1394_107" alt="Pegawai Restoran" />
													<label for="role1394_107">Pegawai Restoran</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1393" id="role1393_107" alt="Persiapan Makanan/Pembantu Dapur" />
													<label for="role1393_107">Persiapan Makanan/Pembantu Dapur</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1396" id="role1396_107" alt="Supervisor/Pemimpin Tim" />
													<label for="role1396_107">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1398" id="role1398_107" alt="Lainnya" />
													<label for="role1398_107">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;114&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="114" id="specialization114" alt="Hotel/Pariwisata" />
											<label for="specialization114">Hotel/Pariwisata</label>
											<ul id="optSpeRole114" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1429" id="role1429_114" alt="Dealer Kasino" />
													<label for="role1429_114">Dealer Kasino</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1428" id="role1428_114" alt="Koordinator/Agen Perjalanan" />
													<label for="role1428_114">Koordinator/Agen Perjalanan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1435" id="role1435_114" alt="Manajemen" />
													<label for="role1435_114">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1434" id="role1434_114" alt="Manajer Hotel" />
													<label for="role1434_114">Manajer Hotel</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1431" id="role1431_114" alt="Operasi Kapal Pesiar" />
													<label for="role1431_114">Operasi Kapal Pesiar</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1430" id="role1430_114" alt="Operasi Kasino" />
													<label for="role1430_114">Operasi Kasino</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1427" id="role1427_114" alt="Pemandu Wisata" />
													<label for="role1427_114">Pemandu Wisata</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1425" id="role1425_114" alt="Penjaga Kebersihan Hotel" />
													<label for="role1425_114">Penjaga Kebersihan Hotel</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1426" id="role1426_114" alt="Penjaga Pintu Hotel" />
													<label for="role1426_114">Penjaga Pintu Hotel</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1432" id="role1432_114" alt="Petugas Layanan Tiket" />
													<label for="role1432_114">Petugas Layanan Tiket</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1424" id="role1424_114" alt="Resepsionis" />
													<label for="role1424_114">Resepsionis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1433" id="role1433_114" alt="Supervisor/Pemimpin Tim" />
													<label for="role1433_114">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1436" id="role1436_114" alt="Lainnya" />
													<label for="role1436_114">Lainnya</label>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<!-- Half Way Mark -->
								<div class="half">
									<ul>
										<li>
											<div class="ulgroup">Manufaktur</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;115&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="115" id="specialization115" alt="Pemeliharaan" />
											<label for="specialization115">Pemeliharaan</label>
											<ul id="optSpeRole115" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1345" id="role1345_115" alt="Manajemen" />
													<label for="role1345_115">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1342" id="role1342_115" alt="Pemelihara Gedung/Fasilitas" />
													<label for="role1342_115">Pemelihara Gedung/Fasilitas</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1343" id="role1343_115" alt="Pemelihara Mesin" />
													<label for="role1343_115">Pemelihara Mesin</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1344" id="role1344_115" alt="Supervisor/Pemimpin Tim" />
													<label for="role1344_115">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1346" id="role1346_115" alt="Lainnya" />
													<label for="role1346_115">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;194&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="194" id="specialization194" alt="Manufaktur" />
											<label for="specialization194">Manufaktur</label>
											<ul id="optSpeRole194" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1283" id="role1283_194" alt="CAD-CAM/Konseptor " />
													<label for="role1283_194">CAD-CAM/Konseptor</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1052" id="role1052_194" alt="Desainer Industri/Produk" />
													<label for="role1052_194">Desainer Industri/Produk</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1290" id="role1290_194" alt="Manajemen" />
													<label for="role1290_194">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1280" id="role1280_194" alt="Operator Mesin Presisi" />
													<label for="role1280_194">Operator Mesin Presisi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1279" id="role1279_194" alt="Pembuat Peralatan/Operator Mesin" />
													<label for="role1279_194">Pembuat Peralatan/Operator Mesin</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1285" id="role1285_194" alt="Penulis Teknis" />
													<label for="role1285_194">Penulis Teknis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1289" id="role1289_194" alt="Project Management" />
													<label for="role1289_194">Project Management</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1288" id="role1288_194" alt="Supervisor/Pemimpin Tim" />
													<label for="role1288_194">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1278" id="role1278_194" alt="Teknisi Pencetakan" />
													<label for="role1278_194">Teknisi Pencetakan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1277" id="role1277_194" alt="Teknisi Pengetesan" />
													<label for="role1277_194">Teknisi Pengetesan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1276" id="role1276_194" alt="Teknisi Proses" />
													<label for="role1276_194">Teknisi Proses</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1286" id="role1286_194" alt="Teknisi R&amp;D" />
													<label for="role1286_194">Teknisi R&amp;D</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1282" id="role1282_194" alt="Teknisi/Operator Produksi" />
													<label for="role1282_194">Teknisi/Operator Produksi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1281" id="role1281_194" alt="Tukang Las" />
													<label for="role1281_194">Tukang Las</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1291" id="role1291_194" alt="Lainnya" />
													<label for="role1291_194">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="196" id="specialization196" alt="Kontrol Proses" />
											<label for="specialization196">Kontrol Proses</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;140&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="140" id="specialization140" alt="Pembelian/Manajemen Material" />
											<label for="specialization140">Pembelian/Manajemen Material</label>
											<ul id="optSpeRole140" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1476" id="role1476_140" alt="Analis/Konsultan" />
													<label for="role1476_140">Analis/Konsultan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1473" id="role1473_140" alt="Gudang" />
													<label for="role1473_140">Gudang</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1475" id="role1475_140" alt="Kontrol Inventoris" />
													<label for="role1475_140">Kontrol Inventoris</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1478" id="role1478_140" alt="Manajemen" />
													<label for="role1478_140">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1472" id="role1472_140" alt="Pembelian" />
													<label for="role1472_140">Pembelian</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1474" id="role1474_140" alt="Perencana Materi" />
													<label for="role1474_140">Perencana Materi</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1477" id="role1477_140" alt="Supervisor/Pemimpin Tim" />
													<label for="role1477_140">Supervisor/Pemimpin Tim</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1479" id="role1479_140" alt="Lainnya" />
													<label for="role1479_140">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="197" id="specialization197" alt="Penjaminan Kualitas / QA" />
											<label for="specialization197">Penjaminan Kualitas / QA</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Penjualan/Marketing</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="142" id="specialization142" alt="Penjualan - Korporasi" />
											<label for="specialization142">Penjualan - Korporasi</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="139" id="specialization139" alt="Pemasaran/Pengembangan Bisnis" />
											<label for="specialization139">Pemasaran/Pengembangan Bisnis</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="149" id="specialization149" alt="Merchandising" />
											<label for="specialization149">Merchandising</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="145" id="specialization145" alt="Penjualan Ritel" />
											<label for="specialization145">Penjualan Ritel</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="143" id="specialization143" alt="Penjualan - Teknik/Teknikal/IT" />
											<label for="specialization143">Penjualan - Teknik/Teknikal/IT</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="144" id="specialization144" alt="Proses desain dan kontrol" />
											<label for="specialization144">Proses desain dan kontrol</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="151" id="specialization151" alt="Tele-sales/Telemarketing" />
											<label for="specialization151">Tele-sales/Telemarketing</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Ilmu Pengetahuan</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;103&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="103" id="specialization103" alt="Aktuaria/Statistik" />
											<label for="specialization103">Aktuaria/Statistik</label>
											<ul id="optSpeRole103" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1156" id="role1156_103" alt="Aktuari" />
													<label for="role1156_103">Aktuari</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="102" id="specialization102" alt="Pertanian" />
											<label for="specialization102">Pertanian</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="181" id="specialization181" alt="Penerbangan" />
											<label for="specialization181">Penerbangan</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="182" id="specialization182" alt="Bioteknologi" />
											<label for="specialization182">Bioteknologi</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="183" id="specialization183" alt="Kimia" />
											<label for="specialization183">Kimia</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="108" id="specialization108" alt="Teknologi Makanan/Ahli Gizi" />
											<label for="specialization108">Teknologi Makanan/Ahli Gizi</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="109" id="specialization109" alt="Geologi/Geofisika" />
											<label for="specialization109">Geologi/Geofisika</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="199" id="specialization199" alt="Ilmu Pengetahuan &amp; Teknologi/Lab" />
											<label for="specialization199">Ilmu Pengetahuan &amp; Teknologi/Lab</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Pelayanan</div>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="119" id="specialization119" alt="Keamanan / Angkatan Bersenjata" />
											<label for="specialization119">Keamanan / Angkatan Bersenjata</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="134" id="specialization134" alt="Pelayanan Pelanggan" />
											<label for="specialization134">Pelayanan Pelanggan</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="147" id="specialization147" alt="Logistik/Jaringan distribusi" />
											<label for="specialization147">Logistik/Jaringan distribusi</label>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;138&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="138" id="specialization138" alt="Hukum / Legal" />
											<label for="specialization138">Hukum / Legal</label>
											<ul id="optSpeRole138" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1063" id="role1063_138" alt="Asisten Hukum/Paralegal" />
													<label for="role1063_138">Asisten Hukum/Paralegal</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1064" id="role1064_138" alt="Juru Tulis Hukum" />
													<label for="role1064_138">Juru Tulis Hukum</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1065" id="role1065_138" alt="Mahasiswa Magang" />
													<label for="role1065_138">Mahasiswa Magang</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1068" id="role1068_138" alt="Manajemen" />
													<label for="role1068_138">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1067" id="role1067_138" alt="Manajemen Kontrak" />
													<label for="role1067_138">Manajemen Kontrak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1058" id="role1058_138" alt="Pengacara" />
													<label for="role1058_138">Pengacara</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1059" id="role1059_138" alt="Pengacara Hak Paten/Hak Cipta" />
													<label for="role1059_138">Pengacara Hak Paten/Hak Cipta</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1061" id="role1061_138" alt="Petugas Komplians" />
													<label for="role1061_138">Petugas Komplians</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1062" id="role1062_138" alt="Petugas Pengelolaan Perusahaan" />
													<label for="role1062_138">Petugas Pengelolaan Perusahaan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1060" id="role1060_138" alt="Sekretaris Perusahaan" />
													<label for="role1060_138">Sekretaris Perusahaan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1069" id="role1069_138" alt="Lainnya" />
													<label for="role1069_138">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;118&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="118" id="specialization118" alt="Perawatan Kesehatan / Kecantikan" />
											<label for="specialization118">Perawatan Kesehatan / Kecantikan</label>
											<ul id="optSpeRole118" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1440" id="role1440_118" alt="Ahli Kecantikan/Ahli Rias" />
													<label for="role1440_118">Ahli Kecantikan/Ahli Rias</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1442" id="role1442_118" alt="Instruktor Fitnes" />
													<label for="role1442_118">Instruktor Fitnes</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1444" id="role1444_118" alt="Manajemen" />
													<label for="role1444_118">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1443" id="role1443_118" alt="Pemijat" />
													<label for="role1443_118">Pemijat</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1441" id="role1441_118" alt="Penata Rambut" />
													<label for="role1441_118">Penata Rambut</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1445" id="role1445_118" alt="Lainnya" />
													<label for="role1445_118">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="120" id="specialization120" alt="Pelayanan kemasyarakatan" />
											<label for="specialization120">Pelayanan kemasyarakatan</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="152" id="specialization152" alt="Teknikal &amp; Bantuan Pelanggan" />
											<label for="specialization152">Teknikal &amp; Bantuan Pelanggan</label>
										</li>
									</ul>
									<ul>
										<li>
											<div class="ulgroup">Lainnya</div>
										</li>
										<li class="l2 labelNormal">
											<a href="javascript:toggleSpeRole(&#39;110&#39;);" class="ctoggle-inactive"></a>
											<input type="checkbox" name="specialization[]" value="110" id="specialization110" alt="Pekerjaan Umum" />
											<label for="specialization110">Pekerjaan Umum</label>
											<ul id="optSpeRole110" class="optSpeRole">
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1422" id="role1422_110" alt="Manajemen" />
													<label for="role1422_110">Manajemen</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1412" id="role1412_110" alt="Pekerja Umum" />
													<label for="role1412_110">Pekerja Umum</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1418" id="role1418_110" alt="Pelapis Batu Bata" />
													<label for="role1418_110">Pelapis Batu Bata</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1416" id="role1416_110" alt="Pelukis" />
													<label for="role1416_110">Pelukis</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1409" id="role1409_110" alt="Pembantu" />
													<label for="role1409_110">Pembantu</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1411" id="role1411_110" alt="Pengirim Barang" />
													<label for="role1411_110">Pengirim Barang</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1407" id="role1407_110" alt="Pengurus Rumah" />
													<label for="role1407_110">Pengurus Rumah</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1408" id="role1408_110" alt="Penjaga Anak" />
													<label for="role1408_110">Penjaga Anak</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1414" id="role1414_110" alt="Penjahit" />
													<label for="role1414_110">Penjahit</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1410" id="role1410_110" alt="Petugas Kebersihan" />
													<label for="role1410_110">Petugas Kebersihan</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1417" id="role1417_110" alt="Petugas Taman/Kebun" />
													<label for="role1417_110">Petugas Taman/Kebun</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1406" id="role1406_110" alt="Sopir" />
													<label for="role1406_110">Sopir</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1421" id="role1421_110" alt="Teknisi Otomotif" />
													<label for="role1421_110">Teknisi Otomotif</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1420" id="role1420_110" alt="Teknisi Penyejuk Udara" />
													<label for="role1420_110">Teknisi Penyejuk Udara</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1413" id="role1413_110" alt="Tukang Kayu" />
													<label for="role1413_110">Tukang Kayu</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1415" id="role1415_110" alt="Tukang Ledeng" />
													<label for="role1415_110">Tukang Ledeng</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1419" id="role1419_110" alt="Tukang Listrik" />
													<label for="role1419_110">Tukang Listrik</label>
												</li>
												<li class="l3 labelNormal">
													<input type="checkbox" name="role[]" value="1423" id="role1423_110" alt="Lainnya" />
													<label for="role1423_110">Lainnya</label>
												</li>
											</ul>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="104" id="specialization104" alt="Jurnalis/Editor" />
											<label for="specialization104">Jurnalis/Editor</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="117" id="specialization117" alt="Penerbitan" />
											<label for="specialization117">Penerbitan</label>
										</li>
										<li class="l2 labelNormal">
											<input type="checkbox" name="specialization[]" value="116" id="specialization116" alt="Lainnya/Kategori tidak tersedia" />
											<label for="specialization116">Lainnya/Kategori tidak tersedia</label>
										</li>
									</ul>
								</div>
							</div>
							<div class="menu-section">
								<div class="menu-left">
									<span id="linkClearSpe" class="link">Bersihkan pilihan</span>
								</div>
								<div class="menu-right">
								<input id="speConBtn" type="button" class="btnQsSearch" value="Konfirm" />   
								<input type="button" class="btnQsSearch thickbutton-remove btnCancel" value="Batalkan" /></div>
								<div class="cf"></div>
							</div>
						</div>
						<div class="optConSel" id="specializationSel"></div>
					</div>
				</div>
				<!-- OPTIONS - SALARY -->
				<div class="optSec" id="optSal">
					<div class="optHead">
						<h3 title="job search using salary">Gaji bulanan (IDR)</h3>
					</div>
					<div class="optBody" id="optSalCon">
					<span id="spanLbl">(IDR)</span> 
					<input type="hidden" name="salary-currency" value="7" />
					<span id="spanSal">Minimal 
					<input class="text" type="text" name="salary" value="" id="salary" /> Maksimal 
					<input class="text" type="text" name="salary-max" value="" id="salary-max" /></span>
					<br />
					<span id="spanSalOpt">
						<input type="checkbox" id="salary-option" name="salary-option" checked="checked" />
						<label for="salary-option">Ikutsertakan lowongan dengan gaji yang tidak terperincikan</label>
					</span></div>
				</div>
				<!-- OPTIONS - POSITION -->
				<div class="optSec" id="optPos">
					<div class="optHead">
						<h3 title="job search using position level">Tingkat Posisi</h3>
					</div>
					<div class="optBody" id="optPosCon">
						<ul class="tlist">
							<li class=" cf">
								<input type="checkbox" name="position[]" id="position1" value="1" alt="CEO/GM/Direktur/Manajer Senior" />
								<label for="position1">CEO/GM/Direktur/Manajer Senior</label>
							</li>
							<li>
								<input type="checkbox" name="position[]" id="position3" value="3" alt="Supervisor/Koordinator" />
								<label for="position3">Supervisor/Koordinator</label>
							</li>
							<li>
								<input type="checkbox" name="position[]" id="position5" value="5" alt="Lulusan baru/Pengalaman kerja kurang dari 1 tahun" />
								<label for="position5">Lulusan baru/Pengalaman kerja kurang dari 1 tahun</label>
							</li>
							<li class=" cf">
								<input type="checkbox" name="position[]" id="position2" value="2" alt="Manajer/Asisten Manajer" />
								<label for="position2">Manajer/Asisten Manajer</label>
							</li>
							<li>
								<input type="checkbox" name="position[]" id="position4" value="4" alt="Pegawai (non-manajemen &amp; non-supervisor)" />
								<label for="position4">Pegawai (non-manajemen &amp; non-supervisor)</label>
							</li>
						</ul>
						<div class="cf"></div>
					</div>
				</div>
				<div id="showExtra" class="extraSec custompad">
				<div id="showExtraTog" class="ctoggle-active"></div>  
				<span style="font-size:1.1em;" class="link">Sembunyi Tipe pekerjaan, Tahun pengalaman &amp; lainnya...</span></div>
				<div id="hiddendiv" class="hidethis extraSec" style="display: block;">
					<!-- SEARCH OPTIONS - JOB TYPE -->
					<div class="optSec" id="optTyp">
						<div class="optHead">
							<h3 title="job search using job type">Tipe Pekerjaan</h3>
						</div>
						<div class="optBody" id="optTypCon">
							<ul class="tlist">
								<li class=" cf">
									<input type="checkbox" name="job-type[]" id="job-type5" value="5" alt="Penuh waktu/kontrak" />
									<label for="job-type5">Penuh waktu/kontrak</label>
								</li>
								<li>
									<input type="checkbox" name="job-type[]" id="job-type10" value="10" alt="Paruh waktu/temporer" />
									<label for="job-type10">Paruh waktu/temporer</label>
								</li>
								<li>
									<input type="checkbox" name="job-type[]" id="job-type16" value="16" alt="Magang" />
									<label for="job-type16">Magang</label>
								</li>
							</ul>
							<div class="cf"></div>
						</div>
					</div>
					<!-- OPTIONS - INDUSTRY -->
					<!-- OPTIONS - Field of study -->
					<!-- OPTIONS - Qualification -->
					<!-- OPTIONS - YEAR OF EXPERIENCE -->
					<div class="optSec" id="optYoe">
						<div class="optHead">
							<h3 title="job search using years of experience">Tahun Pengalaman Kerja</h3>
						</div>
						<div class="optBody" id="optYoeCon">dari : 
						<select id="experience-min" name="experience-min" onchange="ctrlYoe(true);">
							<option value="-1">Silakan pilih</option>
							<option value="00">0 tahun</option>
							<option value="01">1 tahun</option>
							<option value="02">2 tahun</option>
							<option value="03">3 tahun</option>
							<option value="04">4 tahun</option>
							<option value="05">5 tahun</option>
							<option value="06">6 tahun</option>
							<option value="07">7 tahun</option>
							<option value="08">8 tahun</option>
							<option value="09">9 tahun</option>
							<option value="10">10 tahun</option>
						</select> sampai : 
						<select id="experience-max" name="experience-max" onchange="ctrlYoe(false);">
							<option value="-1">Silakan pilih</option>
							<option value="00">0 tahun</option>
							<option value="01">1 tahun</option>
							<option value="02">2 tahun</option>
							<option value="03">3 tahun</option>
							<option value="04">4 tahun</option>
							<option value="05">5 tahun</option>
							<option value="06">6 tahun</option>
							<option value="07">7 tahun</option>
							<option value="08">8 tahun</option>
							<option value="09">9 tahun</option>
							<option value="10">10 tahun</option>
							<option value="11">11 tahun</option>
							<option value="12">12 tahun</option>
							<option value="13">13 tahun</option>
							<option value="14">14 tahun</option>
							<option value="15">15 tahun</option>
							<option value="16">16 tahun</option>
							<option value="17">17 tahun</option>
							<option value="18">18 tahun</option>
							<option value="19">19 tahun</option>
							<option value="99">20 tahun atau lebih</option>
						</select></div>
					</div>
					<!-- OPTIONS - NATIONALITY -->
					<!-- OPTIONS - JOB POSTED -->
					<div class="optSec" id="optPst">
						<div class="optHead">
							<h3 title="job search using job posted date">Lowongan yang diiklankan sejak</h3>
						</div>
						<div class="optBody" id="optPstConid">
							<span>
								<input type="radio" name="job-posted[]" value="0" id="job-posted0" checked="checked" />
								<label for="job-posted0">Semua</label>
							</span>
							<span>
								<input type="radio" name="job-posted[]" value="1" id="job-posted1" />
								<label for="job-posted1">1 hari yang lalu</label>
							</span>
							<span>
								<input type="radio" name="job-posted[]" value="3" id="job-posted3" />
								<label for="job-posted3">3 hari yang lalu</label>
							</span>
							<span>
								<input type="radio" name="job-posted[]" value="7" id="job-posted7" />
								<label for="job-posted7">7 hari yang lalu</label>
							</span>
							<span>
								<input type="radio" name="job-posted[]" value="14" id="job-posted14" />
								<label for="job-posted14">14 hari yang lalu</label>
							</span>
							<div class="cf"></div>
						</div>
					</div>
				</div>
				<div class="optSec" style="padding-left:0;">
					<div class="menu-section">
						<div class="menu-left" style="padding-top: 7px;">
							<span class="link" id="btnClearForm">Hapus kriteria pencarian</span>
						</div>
						<div class="menu-right">
							<input class="btnQsSearch" type="submit" title="Cari Lowongan Sekarang" value="Cari Lowongan" />
						</div>
					</div>
					<div class="cf"></div>
				</div>
			</div>
			<input type="hidden" name="src" value="1" /> 
			<input type="hidden" name="sort" value="" /> 
			<input type="hidden" name="order" value="" /></form>
		</div>
	</div>
</div>