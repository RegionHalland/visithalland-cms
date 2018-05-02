{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')
    <div class="dh-landing flex items-center justify-center flex-column">
        {{-- PHP/html content starts --}}
        <div class="dh-landing__inner col-8 sm-col-4 mx-auto px3">
            <svg class="dh-logo z3 relativ block mx-auto" xmlns="http://www.w3.org/2000/svg" width="150" title="{{ get_the_title() }}" height="168" viewBox="0 0 150 168">
              <defs>
                <linearGradient id="a-day-in-halland-logo-a" x1="2.569%" y1="25.578%" y2="75.189%">
                  <stop offset="0%" stop-color="#162E36"/>
                  <stop offset="100%" stop-color="#194958"/>
                </linearGradient>
              </defs>
              <g fill="none" fill-rule="evenodd" transform="translate(0 -1)">
                <path fill="url(#a-day-in-halland-logo-a)" d="M66.851309,166.172517 L9.37312429,132.987471 C4.11330599,129.950714 0.873124295,124.338554 0.873124295,118.265039 L0.873124295,51.8949484 C0.873124295,45.8214334 4.11330599,40.2092741 9.37312429,37.1725166 L66.851309,3.98747115 C72.1111273,0.950713637 78.5914907,0.950713637 83.851309,3.98747115 L141.329494,37.1725166 C146.589312,40.2092741 149.829494,45.8214334 149.829494,51.8949484 L149.829494,118.265039 C149.829494,124.338554 146.589312,129.950714 141.329494,132.987471 L83.851309,166.172517 C78.5914907,169.209274 72.1111273,169.209274 66.851309,166.172517 Z"/>
                <path fill="#09232B" d="M67.851309,160.829861 L13.5,129.450118 C8.85898385,126.770626 6,121.818721 6,116.459737 L6,53.700251 C6,48.3412671 8.85898385,43.3893618 13.5,40.7098699 L67.851309,9.33012702 C72.4923252,6.65063509 78.2102929,6.65063509 82.851309,9.33012702 L137.202618,40.7098699 C141.843634,43.3893618 144.702618,48.3412671 144.702618,53.700251 L144.702618,116.459737 C144.702618,121.818721 141.843634,126.770626 137.202618,129.450118 L82.851309,160.829861 C78.2102929,163.509353 72.4923252,163.509353 67.851309,160.829861 Z"/>
                <path fill="#BAC8CC" fill-rule="nonzero" d="M54.0892671,64.6597485 C52.0132605,64.6597485 51.1780854,65.0892671 50.939464,65.3756128 C50.772429,65.56651 50.5338075,65.7574071 50.3429103,65.7574071 C49.961116,65.7574071 49.7463567,65.4710614 49.7463567,65.1131292 C49.7463567,64.5642999 50.4622211,63.7768491 54.1369914,63.7768491 C55.067615,63.7768491 56.0698251,63.8007113 56.9527244,63.8484355 C58.527626,62.273534 60.0309411,60.7224946 62.0592234,58.6703501 C62.9659849,57.7397265 63.6102628,57.0954486 64.13523,57.0954486 C64.6601972,57.0954486 64.8988186,57.3579322 64.8988186,57.8351751 C64.8988186,58.1931072 64.5647486,58.5749016 64.13523,59.147593 C62.9659849,60.6986324 62.0830856,62.3689826 61.1524619,64.254092 C61.1524619,64.254092 62.1308099,64.421127 62.4171556,64.4449892 C63.0852956,64.5165756 63.46709,64.6358863 63.46709,65.0415428 C63.46709,65.3278885 63.3239171,65.5903721 63.0137092,65.5903721 C62.8228121,65.5903721 62.3932934,65.4949235 62.154672,65.4233371 C61.820602,65.3278885 61.4388077,65.2324399 60.7468055,65.1369914 C60.0309411,66.8312036 59.4582496,68.7878995 59.4582496,69.8378339 C59.4582496,70.1480418 59.5775604,70.4821118 59.5775604,70.8639061 C59.5775604,71.0786654 59.3389389,71.3650111 58.9810067,71.3650111 C58.5753503,71.3650111 58.0981074,71.007079 58.0981074,70.2673525 C58.0981074,69.1696938 58.694661,66.9982387 59.5298361,64.9938185 C58.6707989,64.8983699 58.026521,64.8267835 57.4538295,64.8029213 C54.5903721,67.4993437 51.4167069,70.2673525 48.8395952,70.2673525 C46.8590372,70.2673525 46,69.1696938 46,68.382243 C46,67.881138 46.3102079,67.5232058 46.8113129,67.5232058 C47.3840044,67.5232058 47.4317287,67.9288623 47.4317287,68.2867945 C47.4317287,68.7640374 47.7419366,69.2174181 48.6486981,69.2174181 C50.939464,69.2174181 53.5165756,66.9027901 55.9982387,64.7313349 C55.4255472,64.6836106 54.6858207,64.6597485 54.0892671,64.6597485 Z M62.4410177,59.6486981 C61.5819805,60.5793217 59.840044,62.4644311 58.2890045,63.9916084 C58.8378339,64.0154706 59.3866632,64.0631948 59.9116304,64.1347813 C60.4604597,63.0132605 61.4388077,61.1997375 62.4410177,59.6486981 Z M68.5735889,64.3734027 C69.2178668,64.3734027 69.5996612,64.6358863 69.8144205,64.755197 C70.0769041,63.6336762 70.5780091,62.0587747 71.5086327,60.0782167 C72.5108428,57.9544858 73.7993986,57 74.6584359,57 C75.350438,57 75.7322324,57.4772429 75.7322324,58.1931072 C75.7322324,59.0521444 75.3265759,60.292976 74.1096065,62.2258097 C73.1789829,63.7052627 72.0574621,64.9938185 71.389322,65.7574071 C71.0313898,66.1630636 70.6973198,66.4971336 70.6257334,66.7118929 C70.4109741,67.1414115 70.3155255,67.714103 70.3155255,68.3345188 C70.3155255,68.8356238 70.3632498,70.0525932 70.888217,70.1719039 C71.1268384,70.2196282 71.3654599,70.2673525 71.3654599,70.4821118 C71.3654599,70.7207332 71.0075277,71.0548033 70.4825605,71.0548033 C69.3371776,71.0548033 69.1224183,69.5992124 69.1224183,68.4299673 C68.0724839,69.5753503 66.6646174,70.3628011 65.9010287,70.3628011 C65.4237858,70.3628011 64.6363351,69.9810067 64.6363351,68.9549345 C64.6363351,67.212998 67.0225495,64.3734027 68.5735889,64.3734027 Z M74.348228,58.1215208 C74.1573308,58.1215208 73.4414665,58.7896609 72.4631185,60.7224946 C71.723392,62.2019476 71.0313898,64.6836106 71.0313898,64.6836106 C71.4847706,64.1586434 72.4869807,62.9893983 73.2982936,61.5338075 C74.3005037,59.7441466 74.6345737,59.0282823 74.6345737,58.3840044 C74.6345737,58.1931072 74.5629873,58.1215208 74.348228,58.1215208 Z M68.5735889,65.56651 C67.5236546,65.6380964 65.8771666,67.881138 65.8771666,68.7401752 C65.8771666,69.0503831 66.0680637,69.2174181 66.282823,69.2174181 C67.0225495,69.2174181 69.1940047,66.9505144 69.3371776,66.2585122 C69.1940047,66.2107879 69.0031075,66.1153393 68.9792454,65.8528557 C68.9553833,65.6619585 68.7644861,65.56651 68.5735889,65.56651 Z M77.0446503,64.8983699 C77.1162368,64.8983699 77.3787204,64.421127 77.7366525,64.421127 C78.1900333,64.421127 78.4525169,64.6836106 78.4525169,65.0176806 C78.4525169,65.4233371 77.5934797,66.4494093 77.3071339,67.0698251 C77.0685125,67.547068 76.8776153,68.0720352 76.8776153,68.4061052 C76.8776153,68.6447266 76.9730639,68.9072102 77.1878232,68.9072102 C77.975274,68.9072102 79.3115541,67.4754815 80.1705913,66.4494093 C80.456937,66.0914772 80.7671449,65.7096828 81.0296285,65.7096828 C81.2443878,65.7096828 81.4114228,65.8289936 81.4114228,66.067615 C81.4114228,66.3300986 81.2921121,66.4971336 81.0057664,66.8550658 C79.8603834,68.215208 78.0229983,70.0048689 76.8060289,70.0048689 C76.0185781,70.0048689 75.6367838,69.4560396 75.6367838,68.7878995 C75.6367838,68.5254159 75.6606459,68.2867945 75.6845081,67.9527244 C74.9925059,68.6447266 73.36988,70.2673525 72.2960835,70.2673525 C71.9858756,70.2673525 71.4847706,69.8378339 71.4847706,69.2174181 C71.4847706,66.7596172 74.2527794,64.3734027 76.0663024,64.3734027 C76.4480967,64.3734027 76.8060289,64.6120242 77.0446503,64.8983699 Z M75.7560945,65.4949235 C74.8016087,65.4949235 72.7733264,67.6902409 72.7733264,68.7878995 C72.7733264,68.9072102 72.868775,68.9787967 72.9880857,68.9787967 C73.3460179,68.9787967 76.2810617,66.4255472 76.2810617,65.9721664 C76.2810617,65.7096828 76.0663024,65.4949235 75.7560945,65.4949235 Z M85.4441253,72.4388077 C85.3486767,72.4388077 85.0861931,72.4626698 84.9191581,72.5103941 C84.4419152,76.0181294 82.437495,81.0291798 79.4308648,81.0291798 C78.5241033,81.0291798 77.7127904,80.3849019 77.7127904,79.3111053 C77.7127904,78.1895845 78.4047926,76.1851644 80.0751427,74.3716414 C81.4591471,72.8444641 83.3681187,71.8899783 83.8214994,71.6990812 C84.0123966,69.8855582 84.2748802,67.1175494 84.2748802,66.7596172 C83.6783266,67.6663787 81.7216307,70.2673525 80.4330749,70.2673525 C79.955832,70.2673525 79.5263134,69.9094203 79.5263134,69.2174181 C79.5263134,68.5492781 80.2660399,66.4494093 80.5762478,65.733545 C80.9103178,64.9222321 81.2682499,64.4927135 81.6977686,64.4927135 C82.103425,64.4927135 82.3181843,64.7313349 82.3181843,64.9938185 C82.3181843,65.2085778 82.1272872,65.4710614 81.8409414,65.9244421 C81.3636985,66.6641686 80.7194206,68.5970024 80.7194206,68.8117617 C80.7194206,68.9549345 80.7432828,69.0503831 80.8625935,69.0503831 C81.435285,69.0503831 83.1056351,66.8073415 83.5590158,66.1153393 C83.916948,65.6142343 84.2748802,64.9938185 84.3941909,64.8983699 C84.6089502,64.7074728 85.1339174,64.4449892 85.3486767,64.4449892 C85.563436,64.4449892 85.8497817,64.4927135 85.8497817,64.8745078 C85.8497817,65.0176806 85.8259196,65.1608535 85.7543332,65.3278885 C85.6350224,65.6380964 85.4679874,66.1630636 85.4202631,66.9027901 C85.2055038,69.9810067 85.1100553,70.840044 85.062331,71.5559083 C85.1816417,71.5320462 85.3486767,71.508184 85.4679874,71.508184 C86.6133704,71.508184 87.8303398,72.0331512 87.8303398,73.154672 C87.8303398,73.6080528 87.5917183,74.1091578 87.0667511,74.1091578 C86.6372325,74.1091578 86.4701975,73.8705363 86.4701975,73.5364663 C86.4701975,73.3455692 86.5417839,73.2023963 86.5417839,72.9160506 C86.5417839,72.7012912 86.0884032,72.4388077 85.4441253,72.4388077 Z M83.749913,72.820602 C83.2965323,73.0592234 81.9125279,73.9898471 80.6716963,75.3738515 C79.3592784,76.8055801 78.810449,78.5236546 78.810449,79.3826918 C78.810449,79.7883482 79.1206569,80.1224183 79.4785891,80.1224183 C81.6261821,80.1224183 83.4635673,75.302265 83.749913,72.820602 Z M94.5117403,60.0543545 C94.798086,60.0543545 95.0844318,60.1975274 95.0844318,60.7702189 C95.0844318,61.3906346 94.4401539,61.772429 94.129946,61.772429 C93.7481517,61.772429 93.6049788,61.2713239 93.6049788,60.9133917 C93.6049788,60.5315974 93.9867731,60.0543545 94.5117403,60.0543545 Z M94.4878781,66.4494093 C94.7742239,66.0914772 95.0844318,65.7096828 95.3469154,65.7096828 C95.5616747,65.7096828 95.7287097,65.8289936 95.7287097,66.067615 C95.7287097,66.3300986 95.6093989,66.4971336 95.3230532,66.8550658 C94.2015324,68.215208 92.0539394,70.1957661 90.83697,70.1957661 C90.335865,70.1957661 89.7870356,69.7662474 89.7870356,68.9310724 C89.7870356,67.881138 91.004005,65.5426478 91.1949022,65.1847157 C91.4812479,64.7074728 91.7198694,64.3256784 92.0539394,64.3256784 C92.3880094,64.3256784 92.650493,64.5165756 92.650493,64.8267835 C92.650493,65.1608535 92.483458,65.3278885 92.3402851,65.5426478 C91.6482829,66.6641686 90.9801429,68.3106566 90.9801429,68.7878995 C90.9801429,68.9549345 91.0994536,69.1696938 91.3142129,69.1696938 C91.9584908,69.1696938 93.6765652,67.547068 94.4878781,66.4494093 Z M103.102112,66.4494093 C103.388458,66.0914772 103.698666,65.7096828 103.96115,65.7096828 C104.175909,65.7096828 104.342944,65.8289936 104.342944,66.067615 C104.342944,66.3300986 104.223633,66.4971336 103.937287,66.8550658 C102.839629,68.215208 101.264727,70.0048689 100.07162,70.0048689 C98.8785128,70.0048689 98.6637535,68.9072102 98.6637535,67.8572759 C98.6637535,67.3323087 98.8069263,66.6164443 98.8069263,66.0437529 C98.8069263,65.9244421 98.7353399,65.7812693 98.592167,65.7812693 C97.924027,65.7812693 95.6571232,68.3106566 95.1082939,69.0503831 C94.8696725,69.360591 94.6549132,70.4105254 94.2492567,70.4105254 C93.8197381,70.4105254 93.4379438,70.2434903 93.4379438,69.7662474 C93.4379438,69.1696938 94.3685674,66.7118929 94.8219482,65.3040264 C95.1560182,64.2302299 95.3230532,63.8722977 95.943469,63.8722977 C96.110504,63.8722977 96.444574,64.0393327 96.444574,64.3734027 C96.444574,64.7074728 96.3491254,64.9222321 96.110504,65.5903721 C95.9673311,65.9721664 95.6571232,67.0221008 95.6093989,67.1652737 C96.3729876,66.3062365 98.091062,64.4449892 99.1409964,64.4449892 C99.6659636,64.4449892 100.07162,64.7790592 100.07162,65.3517507 C100.07162,66.067615 99.9284471,66.7596172 99.9284471,67.5947923 C99.9284471,68.3345188 99.9761714,68.9787967 100.429552,68.9787967 C100.978382,68.9787967 102.290799,67.547068 103.102112,66.4494093 Z"/>
                <path fill="#FFF" d="M22,77.4870179 C22,76.5204563 22.5204563,76 23.4870179,76 L24.825334,76 C25.7918957,76 26.3123519,76.5204563 26.3123519,77.4870179 L26.3123519,86.8552308 L31.2566865,86.8552308 L31.2566865,77.4870179 C31.2566865,76.5204563 31.7771428,76 32.7437044,76 L34.0820205,76 C35.0485822,76 35.5690385,76.5204563 35.5690385,77.4870179 L35.5690385,100.535796 C35.5690385,101.502357 35.0485822,102.022813 34.0820205,102.022813 L32.7437044,102.022813 C31.7771428,102.022813 31.2566865,101.502357 31.2566865,100.535796 L31.2566865,90.7214773 L26.3123519,90.7214773 L26.3123519,100.535796 C26.3123519,101.502357 25.7918957,102.022813 24.825334,102.022813 L23.4870179,102.022813 C22.5204563,102.022813 22,101.502357 22,100.535796 L22,77.4870179 Z M52.5953936,100.424269 C52.7812708,101.465182 52.2608145,102.022813 51.2570774,102.022813 L49.8815859,102.022813 C48.9893751,102.022813 48.4317434,101.576708 48.2830416,100.647322 L47.5767081,96.2234436 L42.8182508,96.2234436 L42.1119173,100.647322 C41.9632155,101.576708 41.4055838,102.022813 40.513373,102.022813 L39.3609341,102.022813 C38.357197,102.022813 37.8367408,101.465182 38.022618,100.424269 L42.2977945,77.3383161 C42.4464963,76.4461054 43.0413035,76 43.9335142,76 L46.6101465,76 C47.5023572,76 48.0971644,76.4461054 48.2458662,77.3383161 L52.5953936,100.424269 Z M43.3758825,92.6546006 L47.0190764,92.6546006 L45.1974794,81.0930364 L43.3758825,92.6546006 Z M64.5287123,98.1565669 C65.495274,98.1565669 66.0157302,98.6770232 66.0157302,99.6435848 L66.0157302,100.535796 C66.0157302,101.502357 65.495274,102.022813 64.5287123,102.022813 L56.535991,102.022813 C55.5694294,102.022813 55.0489731,101.502357 55.0489731,100.535796 L55.0489731,77.4870179 C55.0489731,76.5204563 55.5694294,76 56.535991,76 L57.8743072,76 C58.8408688,76 59.3613251,76.5204563 59.3613251,77.4870179 L59.3613251,98.1565669 L64.5287123,98.1565669 Z M77.8003472,98.1565669 C78.7669088,98.1565669 79.2873651,98.6770232 79.2873651,99.6435848 L79.2873651,100.535796 C79.2873651,101.502357 78.7669088,102.022813 77.8003472,102.022813 L69.8076259,102.022813 C68.8410643,102.022813 68.320608,101.502357 68.320608,100.535796 L68.320608,77.4870179 C68.320608,76.5204563 68.8410643,76 69.8076259,76 L71.145942,76 C72.1125037,76 72.6329599,76.5204563 72.6329599,77.4870179 L72.6329599,98.1565669 L77.8003472,98.1565669 Z M94.9010532,100.424269 C95.0869304,101.465182 94.5664742,102.022813 93.5627371,102.022813 L92.1872455,102.022813 C91.2950348,102.022813 90.737403,101.576708 90.5887012,100.647322 L89.8823677,96.2234436 L85.1239104,96.2234436 L84.4175769,100.647322 C84.2688751,101.576708 83.7112434,102.022813 82.8190326,102.022813 L81.6665938,102.022813 C80.6628567,102.022813 80.1424004,101.465182 80.3282776,100.424269 L84.6034541,77.3383161 C84.7521559,76.4461054 85.3469631,76 86.2391738,76 L88.9158061,76 C89.8080168,76 90.402824,76.4461054 90.5515258,77.3383161 L94.9010532,100.424269 Z M85.6815421,92.6546006 L89.324736,92.6546006 L87.5031391,81.0930364 L85.6815421,92.6546006 Z M101.29523,100.535796 C101.29523,101.502357 100.774774,102.022813 99.8082123,102.022813 L98.8416507,102.022813 C97.875089,102.022813 97.3546327,101.502357 97.3546327,100.535796 L97.3546327,77.4870179 C97.3546327,76.5204563 97.875089,76 98.8416507,76 L100.403019,76 C101.258055,76 101.815686,76.4089299 102.075915,77.2267898 L107.131776,92.0969689 L107.131776,77.4870179 C107.131776,76.5204563 107.652232,76 108.618793,76 L109.585355,76 C110.551917,76 111.072373,76.5204563 111.072373,77.4870179 L111.072373,100.535796 C111.072373,101.502357 110.551917,102.022813 109.585355,102.022813 L108.247039,102.022813 C107.392004,102.022813 106.834372,101.613884 106.574144,100.796024 L101.29523,85.1079847 L101.29523,100.535796 Z M121.444323,76 C125.38492,76 127.987202,77.5613688 127.987202,81.5019663 L127.987202,96.5208472 C127.987202,100.461445 125.38492,102.022813 121.444323,102.022813 L116.276936,102.022813 C115.310374,102.022813 114.789918,101.502357 114.789918,100.535796 L114.789918,77.4870179 C114.789918,76.5204563 115.310374,76 116.276936,76 L121.444323,76 Z M123.67485,82.1711243 C123.67485,80.3123519 122.708288,79.7918957 121.295621,79.7918957 L119.10227,79.7918957 L119.10227,98.2309178 L121.295621,98.2309178 C122.708288,98.2309178 123.67485,97.7104615 123.67485,95.8516891 L123.67485,82.1711243 Z"/>
              </g>
            </svg>
            <p class="dh-landing__p light z3 relative center mt3">{{ get_the_content() }}</p>
        </div>
        <picture>
            <source media="(min-width: 60em)" srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
            <source srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
            <img class="dh-landing__img lazyload z2"
                src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
        </picture>
    </div>
    {{-- PHP/html content ends --}}


    {{-- Vue below --}}
    <div id="app" class="dh-wizard relative">
        <div class="dh-wizard__inner relative">
            <transition :name="transitionName">
                <router-view></router-view>
            </transition>
        </div>
    </div>
@endsection
