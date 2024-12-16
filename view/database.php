<?php


class Database
{
  
  /**
 * Sử dụng cho câu truy vấn SELECT
 * @param string $query Câu truy vấn
 * @param array $format Định dạng kết quả trả về.
 * $format = ['row' => int, 'cell' => int|string]
 * @return array|string $arr
 */
public static function GetData($query, $format = []) {
    if (is_array($format)) {
        try {
            // Kết nối cơ sở dữ liệu
            $connect = connectdb();
            
            // Chuẩn bị câu truy vấn
            $stmt = $connect->prepare($query);
            
            if (!$stmt) {
                die('Invalid query: ' . $connect->errorInfo()[2]);
            }
            
            // Thực thi câu truy vấn
            $stmt->execute();
            
            // Lấy kết quả
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $arr = [];
            
            if (count($result) > 0) {
                $arr = $result; // Gán toàn bộ kết quả vào mảng `$arr`
                
                // Xử lý format['cell']
                if (isset($format['cell'])) {
                    $formatRow = isset($format['row']) ? $format['row'] : 0;
                    $formatKey = is_numeric($format['cell']) 
                        ? array_keys($arr[$formatRow])[$format['cell']] 
                        : $format['cell'];
                    return isset($arr[$formatRow][$formatKey]) ? $arr[$formatRow][$formatKey] : null;
                }
                
                // Xử lý format['row']
                if (isset($format['row'])) {
                    return isset($arr[$format['row']]) ? $arr[$format['row']] : [];
                }
            }
            
            return $arr;
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }
    return [];
}

    
    // public static function GetData($query, $format = [])
    // {
    //     if (is_array($format)) {
    //         $connect = self::Connect();
    //         $resQuery = $connect->query($query);

    //         if (!$resQuery) {
    //             die('Invalid query: ' . $connect->error);
    //         } else {
    //             $arr = [];
    //             if ($resQuery->num_rows > 0) {
    //                 while ($row = $resQuery->fetch_assoc()) {
    //                     $arr[] = $row;
    //                 }

    //                 // Trả về một giá trị theo key hoặc index
    //                 if (isset($format['cell'])) {
    //                     $formatRow = isset($format['row']) ? $format['row'] : 0;
    //                     $formatKey = is_numeric($format['cell']) ? array_keys($arr[$formatRow])[$format['cell']] : $format['cell'];
    //                     return isset($formatRow) ? $arr[$formatRow][$formatKey] : $arr[0][$formatKey];
    //                 }

    //                 // Trả về một dòng dữ liệu tại index
    //                 if (isset($format['row'])) {
    //                     return $arr[$format['row']];
    //                 }
    //             }
    //         }
    //         $connect->close();
    //         return $arr;
    //     }
    //     return [];
    // }

    /**
     * Sử dụng cho câu truy vấn SELECT có tính năng phân trang
     */
    public static function GetDataWithPagination($query, $offset = 10, $page = 1)
    {
        $countAll = (int)self::GetData($query, ['cell' => 0]);

        $start = ($page - 1) * $offset;
        $data = self::GetData($query . " LIMIT $start, $offset");
        $end = $start + count($data);
        return [
            'data'        => $data,
            'start'       => $start + 1,
            'end'         => $end,
            'countAll'    => $countAll,
            'page_number' => ceil($countAll / $offset),
        ];
    }
    /**
     * Dùng cho truy vấn INSERT, UPDATE, DELETE
     */
    public static function NonQuery($query) {
    try {
        // Kết nối cơ sở dữ liệu
        $connect = connectdb();
        
        // Chuẩn bị câu truy vấn
        $stmt = $connect->prepare($query);
        
        // Thực thi câu truy vấn
        $result = $stmt->execute();
        
        // Trả về kết quả
        return $result === true;
    } catch (PDOException $e) {
        // Xử lý lỗi nếu xảy ra
        die('Database error: ' . $e->getMessage());
    }
}

    
     // public static function NonQuery($query)
    // {
    //     $connect = self::Connect();
    //     $result = $connect->query($query);
    //     $connect->close();
    //     return $result == true;
    // }
}