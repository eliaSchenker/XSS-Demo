<?php
    $test = str_replace("<?php", "", $_POST["code"]);
    $test = str_replace("?>", "", $test);
    //Liste an gefährlichen Funktionen, welche mit eval ausgenützt werden könnten.
    $dangerousfunctions = array("exec", "passthru", "system", "shell_exec", "`", "popen", "proc_open", "pcntl_exec", "assert", "preg_replace", "create_function", "include", "include_once", "require", "require_once", "ReflectionFunction", "ob_start", "array_diff_uassoc", "array_diff_ukey", "array_filter", "array_intersect_uassoc", "array_intersect_ukey", "array_map", "array_reduce", "array_udiff_assoc", "array_udiff_uassoc", "array_udiff", "array_uintersect_assoc", "array_uintersect_uassoc", "array_uintersect", "array_walk_recursive", "array_walk", "assert_options", "uasort", "uksort", "usort", "preg_replace_callback", "spl_autoload_register", "iterator_apply", "call_user_func", "call_user_func_array", "register_shutdown_function", "register_tick_function", "set_error_handler", "set_exception_handler", "session_set_save_handler", "sqlite_create_aggregate", "sqlite_create_function", "phpinfo", "posix_mkfifo", "posix_getlogin", "posix_ttyname", "getenv", "get_current_user", "proc_get_status", "get_cfg_var", "disk_free_space", "disk_total_space", "diskfreespace", "getcwd", "getlastmo", "getmygid", "getmyinode", "getmypid", "getmyuid", "extract", "parse_str", "parse_str", "putenv", "ini_set", "mail", "header", "proc_nice", "proc_terminate", "proc_close", "pfsockopen", "fsockopen", "apache_child_terminate", "posix_kill", "posixmkfifo", "posix_setpgid", "posix_setsid", "posix_setuid", "fopen", "tmpfile", "bzopen", "gzopen", "SplFileObject", "chgrp", "chmod", "chown", "copy", "file_put_contents", "lchgrp", "lchown", "link", "mkdir", "move_uploaded_file", "rename", "rmdir". "symlink", "tempnam", "touch", "unlink", "impagepng", "imagewbmp", "image2wbmp", "imagejpeg", "imagexbm", "imagegif", "imagegd", "imagegd2", "iptcembed", "ftp_get", "ftp_nb_get", "file_exists", "file_get_contents", "file", "glob", "is_dir", "is_executable", "is_file", "is_link", "is_readable", "is_uploaded_file", "is_writeable", "is_writable", "linkinfo", "readfile", "readlink", "realpath", "stat", "gzfile", "readgzfile", "getimagesize", "imagecreate", "ftp_put", "ftp_nb_put", "exif_thumbnail", "read_exif_data", "exif_read_data", "exif_imagetype", "hash", "md5", "sha1", "highlight", "show_source", "php_strip_whitespace", "get_meta_tags");
    //Iterieren und falls eine gefährliche Funktion gefunden wird, Fehlermeldung zurückgeben
    foreach($dangerousfunctions as $func) {
        if(str_contains($test, $func)) {
            http_response_code(400);
            echo "Illegale Funktion gefunden.";
            exit();
        }
    }
    try {
        eval($test);
    }catch(Exception $e) {
        http_response_code(400);
        echo $e;
    }
?>
