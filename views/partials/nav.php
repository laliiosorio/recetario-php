  <?php
    $baseURL = '/~losorioortega3';
    // $baseURL = '/recetario-php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>

  <nav class="bg-green-400">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
              <div class="w-full flex items-center">
                  <div class="flex-shrink-0">
                      <div class="text-green-700">
                          <svg fill="currentColor" width="50px" height="50px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                              <path d="m 4.1960651,12.981368 c -0.69813,-0.107 -1.27726,-0.4694 -1.65855,-1.038 -0.14619,-0.2179 -0.28312,-0.5456 -0.332,-0.7943 -0.041,-0.2085 -0.0443,-0.3091 -0.0443,-1.3593004 l 0,-1.0544 -0.10839,0 c -0.18893,0 -0.38036,-0.044 -0.54554,-0.1241 -0.25783,-0.1257 -0.42187,-0.3835 -0.47603,-0.7482 -0.0243,-0.1637 -0.0242,-0.3273 3.2e-4,-0.4098 0.0746,-0.2512 0.474,-0.2841 0.573,-0.047 0.0128,0.031 0.019,0.086 0.0191,0.1709 4.8e-4,0.2504 0.0396,0.384 0.13666,0.4671 0.0705,0.06 0.15264,0.085 0.28473,0.086 l 0.10999,6e-4 0.003,-0.7424 0.003,-0.7425 4.82111,0 4.8211199,0 0,0.7388 0,0.7389 0.0443,0.01 c 0.0243,0 0.0862,0.01 0.13748,0 0.28885,-0.021 0.39163,-0.167 0.39238,-0.5559 2.6e-4,-0.134 0.0157,-0.1922 0.065,-0.2451 0.10822,-0.116 0.33709,-0.1141 0.45497,0 0.0788,0.079 0.0971,0.1522 0.0869,0.3485 -0.0216,0.4146 -0.15787,0.7141 -0.39719,0.8727 -0.17147,0.1135 -0.34921,0.1645 -0.60961,0.1749 l -0.17415,0.01 0,1.0437 c 0,1.0738004 -0.004,1.1715004 -0.0509,1.4032004 -0.0654,0.3198 -0.22379,0.6674 -0.42222,0.9266 -0.0792,0.1034 -0.26046,0.29 -0.36399,0.3747 -0.25427,0.208 -0.55003,0.3587 -0.86358,0.4398 -0.3005499,0.078 -0.1320399,0.074 -3.0976099,0.073 -2.22783,0 -2.7185,0 -2.80928,-0.018 z m -2.0348,-7.1607004 0,-0.4339 2.03257,0 2.03258,0 0.0203,-0.064 c 0.0251,-0.08 0.0939,-0.1961 0.14988,-0.2538 l 0.042,-0.043 0,-0.3203 0,-0.3203 0.54384,0 0.54383,0 0,0.3203 0,0.3203 0.042,0.043 c 0.056,0.058 0.12481,0.1742 0.14989,0.2538 l 0.0203,0.064 2.03258,0 2.0325799,0 0,0.4339 0,0.4338 -4.8212099,0 -4.82121,0 0,-0.4338 z m 1.84183,-0.9654 c -0.0758,-0.019 -0.14721,-0.071 -0.19205,-0.1384 -0.0793,-0.1197 -0.0794,-0.2194 -4.2e-4,-0.3708 0.0748,-0.1433 0.099,-0.2218 0.10662,-0.3463 0.0131,-0.2132 -0.0342,-0.3758 -0.24003,-0.825 -0.18883,-0.412 -0.22078,-0.5047 -0.24637,-0.7149 -0.042,-0.3451 0.10163,-0.7351 0.38339,-1.0408 0.10308,-0.1118 0.22055,-0.1483 0.35326,-0.1097 0.0788,0.023 0.1704,0.097 0.20629,0.1677 0.0281,0.055 0.0316,0.1528 0.007,0.2102 -0.009,0.022 -0.041,0.067 -0.0708,0.1004 -0.0934,0.1054 -0.13061,0.1587 -0.17454,0.2504 -0.0569,0.1188 -0.0722,0.2006 -0.0653,0.3483 0.007,0.1513 0.0488,0.2822 0.19192,0.6025 0.1247,0.2791 0.17235,0.4045 0.21226,0.5587 0.0991,0.3826 0.0701,0.6902 -0.0966,1.027 -0.0587,0.1185 -0.12664,0.2159 -0.17591,0.252 -0.0453,0.033 -0.13213,0.046 -0.19908,0.029 z m 1.37442,-0.095 c -0.0543,-0.017 -0.15585,-0.1102 -0.18869,-0.1726 -0.0369,-0.07 -0.0379,-0.213 -0.002,-0.2824 0.17214,-0.3329 0.1826,-0.3697 0.18211,-0.6416 -4.3e-4,-0.2403 -0.0135,-0.3085 -0.13939,-0.7272 -0.14385,-0.4784 -0.17348,-0.6263 -0.17399,-0.8683 -6.5e-4,-0.3123 0.0723,-0.5618 0.23883,-0.8173 0.12805,-0.1965 0.1984,-0.2507 0.32545,-0.25100005 0.0869,-2e-4 0.17431,0.04 0.23644,0.10900005 0.0598,0.066 0.0813,0.1183 0.0813,0.1961 0,0.077 -0.0183,0.1214 -0.10404,0.2503 -0.16023,0.2408 -0.19627,0.4991 -0.11701,0.8389 0.0131,0.056 0.0631,0.2276 0.11098,0.3807 0.14244,0.4552 0.1808,0.6736 0.16684,0.9499 -0.0127,0.252 -0.068,0.4615 -0.18561,0.7027 -0.0932,0.1913 -0.15923,0.2853 -0.22462,0.3199 -0.0582,0.031 -0.13558,0.036 -0.2066,0.013 z" />
                          </svg>
                      </div>
                  </div>

                  <div class="w-full flex items-center justify-between">
                      <div class="block">
                          <div class="ml-10 flex items-baseline space-x-4">
                              <a href="<?= $baseURL ?>/" class="<?= urlIs('/', $baseURL) ? 'bg-green-700 text-green-400' : 'text-green-700' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                              <a href="<?= $baseURL ?>/recipes" class="<?= urlIs('/recipes', $baseURL) ? 'bg-green-700 text-green-400' : 'text-green-700' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Recetas</a>
                              <a href="<?= $baseURL ?>/activity-2" class="<?= urlIs('/activity-2', $baseURL) ? 'bg-green-700 text-green-400' : 'text-green-700' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Act_2</a>
                              <a href="<?= $baseURL ?>/api/recipes" class="<?= urlIs('/api/recipes', $baseURL) ? 'bg-green-700 text-green-400' : 'text-green-700' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">API_recetas</a>
                              <a href="<?= $baseURL ?>/api/recipe" class="<?= urlIs('/api/recipe', $baseURL) ? 'bg-green-700 text-green-400' : 'text-green-700' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">API_receta</a>
                          </div>
                      </div>

                      <div class="flex items-center gap-6">
                          <?php if (!isset($_SESSION['username'])) : ?>
                              <a href="<?= $baseURL ?>/login" class="text-green-700 hover:text-white text-md font-medium underline">Iniciar
                                  sesión</a>
                              <a href="<?= $baseURL ?>/signup" class="bg-green-700 text-green-400 hover:bg-green-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>
                          <?php endif; ?>

                          <?php if (isset($_SESSION['username'])) : ?>
                              <p class="text-md text-green-700 mr-8">Bienvenido/a,
                                  <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                              <a href="<?= $baseURL ?>/profile" class="text-green-700 hover:text-white text-md font-medium underline">Perfil</a>
                              <form action="logout" method="POST">
                                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-1 rounded-md text-sm font-medium ml-4">Logout</button>
                              </form>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </nav>