<?php 
    // Get data
    function getData($query) {
        global $conn;
        $rows = [];

        $result = mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
        };

        return $rows;
    }

        /* Search and Pagination */
        function paginate($users_id) {
            $paginate = [];

            $courses = getData("SELECT * FROM participans
                                INNER JOIN users ON (users.id = participans.user_id)
                                INNER JOIN courses ON (courses.id = participans.course_id)
                                WHERE user_id = '$users_id' ");

            $paginate['dataPerPage'] = 6;
            $paginate['currentPage'] =  (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $paginate['totalData'] = count($courses);
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
    
            $paginate['result'] = getData("SELECT * FROM participans
                                    INNER JOIN users ON (users.id = participans.user_id)
                                    INNER JOIN courses ON (courses.id = participans.course_id)
                                    WHERE user_id = '$users_id' 
                                    LIMIT $paginate[dataAwal], $paginate[dataPerPage]");
    
            return $paginate;
        }