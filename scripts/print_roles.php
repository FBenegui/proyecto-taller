    <?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Rol;

$roles = Rol::pluck('nombre')->toArray();
if (empty($roles)) {
    echo "<no roles found>\n";
    exit(0);
}
foreach ($roles as $r) {
    echo $r . PHP_EOL;
}
