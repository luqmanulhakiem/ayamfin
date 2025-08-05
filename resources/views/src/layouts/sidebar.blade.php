<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center"
            href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
            <span class="ms-auto font-weight-bold fs-5">AyamFin</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse h-auto  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{-- Pencatatan --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pencatatan</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/pencatatan/pemasukan*') ? 'active' : '' }}"
                    href="{{ route('pencatatan.pemasukan') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M416 224C398.3 224 384 209.7 384 192C384 174.3 398.3 160 416 160L576 160C593.7 160 608 174.3 608 192L608 352C608 369.7 593.7 384 576 384C558.3 384 544 369.7 544 352L544 269.3L374.6 438.7C362.1 451.2 341.8 451.2 329.3 438.7L224 333.3L86.6 470.6C74.1 483.1 53.8 483.1 41.3 470.6C28.8 458.1 28.8 437.8 41.3 425.3L201.3 265.3C213.8 252.8 234.1 252.8 246.6 265.3L352 370.7L498.7 224L416 224z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Pemasukan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/pencatatan/pengeluaran*') ? 'active' : '' }}"
                    href="{{ route('pencatatan.pengeluaran') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M416 416C398.3 416 384 430.3 384 448C384 465.7 398.3 480 416 480L576 480C593.7 480 608 465.7 608 448L608 288C608 270.3 593.7 256 576 256C558.3 256 544 270.3 544 288L544 370.7L374.6 201.3C362.1 188.8 341.8 188.8 329.3 201.3L224 306.7L86.6 169.4C74.1 156.9 53.8 156.9 41.3 169.4C28.8 181.9 28.8 202.2 41.3 214.7L201.3 374.7C213.8 387.2 234.1 387.2 246.6 374.7L352 269.3L498.7 416L416 416z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Pengeluaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/pencatatan/aset*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M64 128C64 92.7 92.7 64 128 64L384 64C419.3 64 448 92.7 448 128L448 272.7C412.3 275.6 379.5 288.3 352 308.1L352 304.1C352 295.3 344.8 288.1 336 288.1L304 288.1C295.2 288.1 288 295.3 288 304.1L288 336.1C288 344.9 295.2 352.1 304 352.1L308 352.1C294.2 371.3 283.9 393.1 277.9 416.6C276 416.2 274 416.1 272 416.1L240 416.1C222.3 416.1 208 430.4 208 448.1L208 528.1L282.9 528.1C289 545.4 297.5 561.5 308 576.1L128 576C92.7 576 64 547.3 64 512L64 128zM176 160C167.2 160 160 167.2 160 176L160 208C160 216.8 167.2 224 176 224L208 224C216.8 224 224 216.8 224 208L224 176C224 167.2 216.8 160 208 160L176 160zM288 176L288 208C288 216.8 295.2 224 304 224L336 224C344.8 224 352 216.8 352 208L352 176C352 167.2 344.8 160 336 160L304 160C295.2 160 288 167.2 288 176zM176 288C167.2 288 160 295.2 160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288zM320 464C320 384.5 384.5 320 464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464zM460.7 396.7C454.5 402.9 454.5 413.1 460.7 419.3L489.4 448L400 448C391.2 448 384 455.2 384 464C384 472.8 391.2 480 400 480L489.4 480L460.7 508.7C454.5 514.9 454.5 525.1 460.7 531.3C466.9 537.5 477.1 537.5 483.3 531.3L539.3 475.3C545.5 469.1 545.5 458.9 539.3 452.7L483.3 396.7C477.1 390.5 466.9 390.5 460.7 396.7z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Aset</span>
                </a>
            </li>
            {{-- End of Pencatatan --}}

            {{-- Laporan --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan Keuangan</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/laporan/pemasukan-dan-pengeluaran*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M128 128C128 110.3 113.7 96 96 96C78.3 96 64 110.3 64 128L64 464C64 508.2 99.8 544 144 544L544 544C561.7 544 576 529.7 576 512C576 494.3 561.7 480 544 480L144 480C135.2 480 128 472.8 128 464L128 128zM534.6 214.6C547.1 202.1 547.1 181.8 534.6 169.3C522.1 156.8 501.8 156.8 489.3 169.3L384 274.7L326.6 217.4C314.1 204.9 293.8 204.9 281.3 217.4L185.3 313.4C172.8 325.9 172.8 346.2 185.3 358.7C197.8 371.2 218.1 371.2 230.6 358.7L304 285.3L361.4 342.7C373.9 355.2 394.2 355.2 406.7 342.7L534.7 214.7z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Pemasukan & Pengeluaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/laporan/laba-rugi*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M32 176C32 134.5 63.6 100.4 104 96.4L104 96L384 96C437 96 480 139 480 192L480 368L304 368C264.2 368 232 400.2 232 440L232 500C232 524.3 212.3 544 188 544C163.7 544 144 524.3 144 500L144 272L80 272C53.5 272 32 250.5 32 224L32 176zM268.8 544C275.9 530.9 280 515.9 280 500L280 440C280 426.7 290.7 416 304 416L552 416C565.3 416 576 426.7 576 440L576 464C576 508.2 540.2 544 496 544L268.8 544zM112 144C94.3 144 80 158.3 80 176L80 224L144 224L144 176C144 158.3 129.7 144 112 144z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Laba Rugi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/laporan/arus-kas*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M566.6 470.6L470.6 566.6C461.4 575.8 447.7 578.5 435.7 573.5C423.7 568.5 416 556.9 416 544L416 480L96 480C78.3 480 64 465.7 64 448C64 430.3 78.3 416 96 416L416 416L416 352C416 339.1 423.8 327.4 435.8 322.4C447.8 317.4 461.5 320.2 470.7 329.3L566.7 425.3C579.2 437.8 579.2 458.1 566.7 470.6zM73.4 214.6C60.9 202.1 60.9 181.8 73.4 169.3L169.4 73.3C178.6 64.1 192.3 61.4 204.3 66.4C216.3 71.4 224 83.1 224 96L224 160L544 160C561.7 160 576 174.3 576 192C576 209.7 561.7 224 544 224L224 224L224 288C224 300.9 216.2 312.6 204.2 317.6C192.2 322.6 178.5 319.8 169.3 310.7L73.3 214.7z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Arus Kas</span>
                </a>
            </li>
            {{-- End of Laporan --}}

            {{-- Master Data --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Management</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/management/aset*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M302.7 69.1C313.2 62.3 326.8 62.3 337.3 69.1L561.3 213.1C573.2 220.8 578.7 235.4 574.7 249C570.7 262.6 558.2 272 544 272L512 272L512 480L563.2 518.4C571.3 524.4 576 533.9 576 544C576 561.7 561.7 576 544 576L96 576C78.3 576 64 561.7 64 544C64 533.9 68.7 524.4 76.8 518.4L128 480L128 480L128 272L96 272C81.8 272 69.3 262.6 65.3 249C61.3 235.4 66.8 220.7 78.7 213.1L302.7 69.1zM400 272L400 480L464 480L464 272L400 272zM288 480L352 480L352 272L288 272L288 480zM176 272L176 480L240 480L240 272L176 272z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Aset</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/management/kategori*') ? 'active' : '' }}"
                    href="{{ route('kategori') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M480 160L352 160L352 288L480 288L480 160zM544 288L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 160C96 124.7 124.7 96 160 96L480 96C515.3 96 544 124.7 544 160L544 288zM160 352L160 480L288 480L288 352L160 352zM288 288L288 160L160 160L160 288L288 288zM352 352L352 480L480 480L480 352L352 352z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/management/karyawan*') ? 'active' : '' }}"
                    href="{{ route('karyawan') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M320 80C377.4 80 424 126.6 424 184C424 241.4 377.4 288 320 288C262.6 288 216 241.4 216 184C216 126.6 262.6 80 320 80zM96 152C135.8 152 168 184.2 168 224C168 263.8 135.8 296 96 296C56.2 296 24 263.8 24 224C24 184.2 56.2 152 96 152zM0 480C0 409.3 57.3 352 128 352C140.8 352 153.2 353.9 164.9 357.4C132 394.2 112 442.8 112 496L112 512C112 523.4 114.4 534.2 118.7 544L32 544C14.3 544 0 529.7 0 512L0 480zM521.3 544C525.6 534.2 528 523.4 528 512L528 496C528 442.8 508 394.2 475.1 357.4C486.8 353.9 499.2 352 512 352C582.7 352 640 409.3 640 480L640 512C640 529.7 625.7 544 608 544L521.3 544zM472 224C472 184.2 504.2 152 544 152C583.8 152 616 184.2 616 224C616 263.8 583.8 296 544 296C504.2 296 472 263.8 472 224zM160 496C160 407.6 231.6 336 320 336C408.4 336 480 407.6 480 496L480 512C480 529.7 465.7 544 448 544L192 544C174.3 544 160 529.7 160 512L160 496z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Karyawan</span>
                </a>
            </li>
            {{-- End of Master Data --}}


            {{-- Pengaturan --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="{{ route('logout.request') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path
                                d="M352.5 32C383.4 32 408.5 57.1 408.5 88C408.5 118.9 383.4 144 352.5 144C321.6 144 296.5 118.9 296.5 88C296.5 57.1 321.6 32 352.5 32zM219.6 240C216.3 240 213.4 242 212.2 245L190.2 299.9C183.6 316.3 165 324.3 148.6 317.7C132.2 311.1 124.2 292.5 130.8 276.1L152.7 221.2C163.7 193.9 190.1 176 219.6 176L316.9 176C345.4 176 371.7 191.1 386 215.7L418.8 272L480.4 272C498.1 272 512.4 286.3 512.4 304C512.4 321.7 498.1 336 480.4 336L418.8 336C396 336 375 323.9 363.5 304.2L353.5 287.1L332.8 357.5L408.2 380.1C435.9 388.4 450 419.1 438.3 445.6L381.7 573C374.5 589.2 355.6 596.4 339.5 589.2C323.4 582 316.1 563.1 323.3 547L372.5 436.2L276.6 407.4C243.9 397.6 224.6 363.7 232.9 330.6L255.6 240L219.7 240zM211.6 421C224.9 435.9 242.3 447.3 262.8 453.4L267.5 454.8L260.6 474.1C254.8 490.4 244.6 504.9 231.3 515.9L148.9 583.8C135.3 595 115.1 593.1 103.9 579.5C92.7 565.9 94.6 545.7 108.2 534.5L190.6 466.6C195.1 462.9 198.4 458.1 200.4 452.7L211.6 421z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Keluar</span>
                </a>
            </li>
            {{-- End of Pengaturan --}}

        </ul>
    </div>
</aside>
