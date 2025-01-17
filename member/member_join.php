<?php
    require_once("../tools.php");
    require_once("MemberDao.php");
    
    // 회원가입 폼에 입력된 데이터 읽기
    $id   = requestValue("id");
    $pw   = requestValue("pw");
    $name = requestValue("name");
	$email = requestValue("email");
    
    // 모든 입력란이 채워져 있고, 사용 중인 아이디가 아니면 
    // 회원정보 추가
    $mdao = new MemberDao();
    if ($id && $pw && $name && $email) {
        if ($mdao->getMember($id))
            errorBack("이미 사용 중인 아이디입니다.");
        else {
            $mdao->insertMember($id, $pw, $name,$email);
            okGo("가입이 완료되었습니다.", MAIN_PAGE);
        }
    } else
        errorBack("모든 입력란을 채워주세요.");
?>