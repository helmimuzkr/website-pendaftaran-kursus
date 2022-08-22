<?php 

    /* getData */
    function get($query) {
        global $conn;

        $result = mysqli_query($conn, $query);

        return $result;
    }

    /* Search */
/*     function search($keyword) {


        $query = "SELECT * FROM kursus 
                    WHERE nama_kursus 
                    LIKE '%$keyword%'";

        return get($query);
    } */

    /* Check Data Search */
    function search($keyword) {
        return get("SELECT * FROM kursus WHERE nama_kursus LIKE '%$keyword%'");
    }

    /* Pagination */
    function paginate($keyword = null) {
        $paginate = [];

        $paginate['dataPerPage'] = 6;
        $paginate['currentPage'] =  (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $paginate['totalData'] = mysqli_num_rows(search($keyword));
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