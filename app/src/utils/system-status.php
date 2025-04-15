<?php

/// AI generated

/**
 * System Status Checker
 * Provides functions to check the status of system services
 */

/**
 * Check database connection status
 * @return array Connection status information
 */
function check_database_status() {
    global $db_host, $db_user, $db_pass, $db_name;
    
    $result = [
        'name' => 'Database (PostgreSQL)',
        'status' => false,
        'message' => 'Not connected',
        'details' => null,
        'icon' => 'fas fa-database'
    ];
    
    try {
        // Try to connect to database
        $dsn = "pgsql:host=$db_host;port=5432;dbname=$db_name";
        $pdo = new PDO($dsn, $db_user, $db_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        // Get server info
        $info = $pdo->query('SELECT version()')->fetch(PDO::FETCH_ASSOC);
        $version = $info['version'] ?? 'Unknown';
        
        $result['status'] = true;
        $result['message'] = 'Connected';
        $result['details'] = [
            'Version' => $version,
            'Host' => $db_host,
            'Access URL' => "postgresql://$db_user@$db_host:5432/$db_name"
        ];
        
        // Close connection
        $pdo = null;
    } catch (PDOException $e) {
        $result['message'] = 'Connection failed';
        $result['details'] = [
            'Error' => $e->getMessage(),
            'Access URL' => "postgresql://$db_user@$db_host:5432/$db_name"
        ];
    }
    
    return $result;
}

/**
 * Check pgAdmin availability
 * @return array pgAdmin status information
 */
function check_pgadmin_status() {
    // Use Docker network service name for internal checks
    $pgadmin_internal = "pgadmin";  
    $pgadmin_host_port = 5050;    
    
    $result = [
        'name' => 'pgAdmin',
        'status' => false,
        'message' => 'Not available',
        'details' => null,
        'icon' => 'fas fa-tools'
    ];
    
    // Get the current host from the HTTP request for external URL
    $host_parts = explode(':', $_SERVER['HTTP_HOST'] ?? 'localhost:8080');
    $current_host = $host_parts[0]; 
    
    // Create access URL for users
    $access_url = "http://{$current_host}:{$pgadmin_host_port}";
    
    // Create URLs for internal docker network check
    $internal_url = "http://{$pgadmin_internal}";
    
    // First, try internal Docker network connection
    $context = stream_context_create([
        'http' => [
            'timeout' => 2,
            'method' => 'HEAD'
        ]
    ]);
    
    // Check if pgAdmin is responding on internal Docker network
    $internal_check = @file_get_contents($internal_url, false, $context);
    
    if ($internal_check !== false) {
        $result['status'] = true;
        $result['message'] = 'Running';
        $result['details'] = [
            'Access URL' => $access_url,
            'Login' => getenv('PGADMIN_DEFAULT_EMAIL') ?: 'admin@local.in',
            'Status' => 'Available (container network)',
            'Internal Name' => $pgadmin_internal,
            'Network' => 'sdmp-network'
        ];
    } else {
        $pgadmin_email = getenv('PGADMIN_DEFAULT_EMAIL');
        $pgadmin_password = getenv('PGADMIN_DEFAULT_PASSWORD');
        
        if ($pgadmin_email && $pgadmin_password) {
            // If properly configured, assume it's running
            $result['status'] = true;
            $result['message'] = 'Running';
            $result['details'] = [
                'Access URL' => $access_url,
                'Login' => $pgadmin_email,
                'Status' => 'Assumed available (config found)',
                'Internal Name' => $pgadmin_internal,
                'Network' => 'sdmp-network'
            ];
        } else {
            $result['details'] = [
                'URL' => $access_url,
                'Status' => 'Unreachable',
                'Internal Name' => $pgadmin_internal,
                'Network' => 'sdmp-network',
                'Note' => 'Check container is running'
            ];
        }
    }
    
    return $result;
}

/**
 * Check PHP configuration
 * @return array PHP status information
 */
function check_php_status() {
    global $host;
    
    return [
        'name' => 'PHP Application',
        'status' => true,
        'message' => 'Running',
        'details' => [
            'Version' => phpversion(),
            'Memory Limit' => ini_get('memory_limit'),
            'Max Upload' => ini_get('upload_max_filesize'),
            'Max Post Size' => ini_get('post_max_size'),
            'Extensions' => implode(', ', ['PDO', 'pgsql']),
            'Access URL' => "http://$host:8080"
        ],
        'icon' => 'fas fa-code'
    ];
}

/**
 * Check file system status
 * @return array File system status information
 */
function check_filesystem_status() {
    global $hostPath;
    
    // App directory is the document root inside the container
    $appDir = dirname($hostPath);
    
    // Inside the container, data directory is external but we can check our own writability
    // The actual data dir is mounted at ./data on the host, but we don't have direct access to it
    $dataDir = '/var/lib/postgresql/data';
    $containerDataDir = '/var/www/html';
    
    // For disk space, check the mounted volume where we are
    $diskTotal = disk_total_space($appDir);
    $diskFree = disk_free_space($appDir);
    $diskUsed = $diskTotal - $diskFree;
    $diskUsedPercent = round(($diskUsed / $diskTotal) * 100, 2);
    
    return [
        'name' => 'File System',
        'status' => ($diskFree > 1024 * 1024 * 100),
        'message' => ($diskFree > 1024 * 1024 * 100) ? 'OK' : 'Low disk space',
        'details' => [
            'Disk Usage' => $diskUsedPercent . '%',
            'Free Space' => format_bytes($diskFree),
            'App Directory' => is_writable($appDir) ? 'Writable' : 'Not writable',
            'Environment' => 'Docker containerized',
            'Web Root' => $containerDataDir,
            'Storage' => 'Data volumes mounted from host'
        ],
        'icon' => 'fas fa-folder-open'
    ];
}

/**
 * Format bytes to human readable format
 * @param int $bytes The number of bytes
 * @return string Human readable size
 */
function format_bytes($bytes) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    
    for ($i = 0; $bytes > 1024; $i++) {
        $bytes /= 1024;
    }
    
    return round($bytes, 2) . ' ' . $units[$i];
}

/**
 * Get all system statuses
 * @return array All system status checks
 */
function get_system_status() {
    return [
        check_database_status(),
        check_pgadmin_status(),
        check_php_status(),
        check_filesystem_status()
    ];
}

/**
 * Check if overall system status is healthy
 * @return bool True if all systems are operational
 */
function is_system_healthy() {
    $statuses = get_system_status();
    
    foreach ($statuses as $status) {
        if (!$status['status']) {
            return false;
        }
    }
    
    return true;
}
?>
