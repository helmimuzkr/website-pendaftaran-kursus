<?php 

    /* getData */
    function get($query) {
        global $conn;
        $rows = [];

        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    /* Search and Pagination */
    function paginate($keyword = null) {
        $paginate = [];

        $paginate['dataPerPage'] = 6;
        $paginate['currentPage'] =  (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $paginate['totalData'] = count(get("SELECT * FROM kursus WHERE nama_kursus LIKE '%$keyword%'"));
        $paginate['totalPages'] = ceil($paginate['totalData'] / $paginate['dataPerPage']);

        /* dataAwal index/dataAwal data = Halaman aktif * Data perpage - Data Perpage */
        $paginate['dataAwal'] = ($paginate['currentPage'] * $paginate['dataPerPage']) - $paginate['dataPerPage'];

        $totalLink = 1;
        /* Start Number Page */
        if($paginate['currentPage'] > $totalLink) {
            $paginate['startPageNum'] = $paginate['currentPage'] - $totalLink;
        }else {
            $paginate['startPageNum'] = 1;
        }
        /* End Number Page */
        if($paginate['currentPage'] < ($paginate['totalPages'] - $totalLink)) {
            $paginate['endPageNum'] = $paginate['currentPage'] + $totalLink;
        }else {
            $paginate['endPageNum'] = $paginate['totalPages'];
        }

        $paginate['result'] = get("SELECT * FROM kursus 
                                    WHERE nama_kursus LIKE '%$keyword%'
                                    ORDER BY id DESC
                                    LIMIT $paginate[dataAwal], $paginate[dataPerPage]");

        return $paginate;
    }