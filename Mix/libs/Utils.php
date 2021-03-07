<?php
class Utils{
    private static $instance;//一个实例
    private function loadLangIfNotLoad() {//loaded == false时候执行该语句
        if (!$this->loaded) {
            if (empty($this->locale)) {
                $this->locale = $this->acceptLocale();
            }
            $this->loadedLangs = array();
            $this->loadLang($this->locale);
            $this->loaded = true;
        }

    }
    /**
     * 替换默认的preg_replace_callback函数
     * @param $pattern
     * @param $callback
     * @param $subject
     * @return string
     */
    public static function handle_preg_replace_callback($pattern, $callback, $subject){
        return self::handleHtml($subject,function ($content) use ($callback, $pattern) {
            return preg_replace_callback($pattern,$callback, $content);
        });
    }


    public static function handle_preg_replace($pattern, $replacement, $subject){
        return self::handleHtml($subject,function ($content) use ($replacement, $pattern) {
            return preg_replace($pattern,$replacement, $content);
        });
    }

        /**
     * 处理 HTML 文本，确保不会解析代码块中的内容
     * @param $content
     * @param callable $callback
     * @return string
     */
    public static function handleHtml($content, $callback) {
        $replaceStartIndex = array();
        $replaceEndIndex = array();
        $currentReplaceId = 0;
        $replaceIndex = 0;
        $searchIndex = 0;
        $searchCloseTag = false;
        $contentLength = strlen($content);
        while (true) {
            if ($searchCloseTag) {
                $tagName = substr($content, $searchIndex, 4);
                if ($tagName == "<cod") {
                    $searchIndex = strpos($content, '</code>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 7;
                } elseif ($tagName == "<pre") {
                    $searchIndex = strpos($content, '</pre>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 6;
                } elseif ($tagName == "<kbd") {
                    $searchIndex = strpos($content, '</kbd>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 6;
                } elseif ($tagName == "<scr") {
                    $searchIndex = strpos($content, '</script>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 9;
                } elseif ($tagName == "<sty") {
                    $searchIndex = strpos($content, '</style>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 8;
                } else {
                    break;
                }


                if (!$searchIndex) {
                    break;
                }
                $replaceIndex = $searchIndex;
                $searchCloseTag = false;
                continue;
            } else {
                $searchCodeIndex = strpos($content, '<code', $searchIndex);
                $searchPreIndex = strpos($content, '<pre', $searchIndex);
                $searchKbdIndex = strpos($content, '<kbd', $searchIndex);
                $searchScriptIndex = strpos($content, '<script', $searchIndex);
                $searchStyleIndex = strpos($content, '<style', $searchIndex);
                if (!$searchCodeIndex) {
                    $searchCodeIndex = $contentLength;
                }
                if (!$searchPreIndex) {
                    $searchPreIndex = $contentLength;
                }
                if (!$searchKbdIndex) {
                    $searchKbdIndex = $contentLength;
                }
                if (!$searchScriptIndex) {
                    $searchScriptIndex = $contentLength;
                }
                if (!$searchStyleIndex) {
                    $searchStyleIndex = $contentLength;
                }
                $searchIndex = min($searchCodeIndex, $searchPreIndex, $searchKbdIndex, $searchScriptIndex, $searchStyleIndex);
                $searchCloseTag = true;
            }
            $replaceStartIndex[$currentReplaceId] = $replaceIndex;
            $replaceEndIndex[$currentReplaceId] = $searchIndex;
            $currentReplaceId++;
            $replaceIndex = $searchIndex;
        }

        $output = "";
        $output .= substr($content, 0, $replaceStartIndex[0]);
        for ($i = 0; $i < count($replaceStartIndex); $i++) {
            $part = substr($content, $replaceStartIndex[$i], $replaceEndIndex[$i] - $replaceStartIndex[$i]);
            if (is_array($callback)) {
                $className = $callback[0];
                $method = $callback[1];
                $renderedPart = call_user_func($className.'::'.$method, $part);
            } else {
                $renderedPart = $callback($part);
            }
            $output.= $renderedPart;
            if ($i < count($replaceStartIndex) - 1) {
                $output.= substr($content, $replaceEndIndex[$i], $replaceStartIndex[$i + 1] - $replaceEndIndex[$i]);
            }
        }
        $output .= substr($content, $replaceEndIndex[count($replaceStartIndex) - 1]);
        return $output;
    }
    public static function remove_last_comma($content){
        if (substr($content,-1) == ","){ //如果一个JSON之后还有一个,的话
            return substr($content,0,strlen($content)-1);
        }else{
            return $content;
        }
    }

}