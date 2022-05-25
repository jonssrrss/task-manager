<?

    /**
     * Пагинация
     */
    class Pagination
    {
        public static function getHtml($countTasks)
        {
            $pageOpened = isset($_GET['page']) ? $_GET['page'] : 1;
        
            $countPages = ceil($countTasks / 3);
        
            $pages = [];
            $a = 1;
        
            while ($a <= $countPages) {
                $pages[] = $a;
                $a++;
            }

            $html = '';

            if (count($pages) > 1) {
                $html .= '<div class="pagination">';
                
                foreach ($pages as $key => $page) {
                    $html .= '<a';
    
                    if ($pageOpened != $page) {
                        $html .= ' href="';
    
                        if (count($_GET) > 0) {
                            $html .= '/?' . mapped_implode('&', array_merge($_GET, ['page' => $page]), '=');
                        } else {
                            $html .= '/?page=' . $page;
                        }
    
                        $html .= '"';
                    }
    
                    $html .= '>'.$page.'</a>';
                }
                
                $html .= '</div>';
            }

            return $html;
        }
    }