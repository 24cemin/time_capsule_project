require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class Database {
    private static $host;
    private static $db;
    private static $user;
    private static $password;
    private static $charset;

    public static function getConnection() {
        self::$host = $_ENV['DB_HOST'];
        self::$db = $_ENV['DB_NAME'];
        self::$user = $_ENV['DB_USER'];
        self::$password = $_ENV['DB_PASS'];
        self::$charset = $_ENV['DB_CHARSET'];

        //DSN (Data Source Name): PDO’nun bağlantı kurması için gerekli bilgi.
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
        try {
            $pdo = new PDO($dsn, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Veritabanı bağlantı hatası: " . $e->getMessage());
        }
    }
}
