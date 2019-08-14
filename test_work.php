<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

function highlight_nicknames(string $text){
    if (!$text) return 'input text';

    if (strpos($text,"\n") !== false) {
        $strings = explode("\n", $text);
        foreach ($strings as &$string){
            $words = explode(' ', $string);
            $string = addTagB($words);
        }
        $text = implode("\n",$strings);
    } else{
        $words = explode(' ', $text);
        $text = addTagB($words);
    }

    return $text;
}
function addTagB($words){
    foreach ($words as &$word){
        if (preg_match('/@+[A-Za-z]+[A-Za-z0-9]/', $word) && !preg_match('/[.,;&?()!#�%^:"+]/', $word)){
            $word = '<b>'.$word.'</b>';
        }
    }
    return implode(' ',$words);
}

echo highlight_nicknames('@storm87 ������� ��� ����� � �����������')."<br>";
echo highlight_nicknames('� ���� � ����� ���� � @300spartans')."<br>";
echo highlight_nicknames('���������� ���: @usernick | ������������ ���: @usernick;')."<br>";
echo highlight_nicknames("���������� ���: @usernick | ������������ ���: @usernick; ������������
� ���� � ����� ���� � @300spartans
������� @storm87 ������� ��� ����� � ����������� @storm87rr")."<br>";
?>
<br>
<br>
<br>
<br>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>