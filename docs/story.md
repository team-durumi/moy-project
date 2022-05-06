# 프로젝트

프로젝트는 일정한 기간 안에 일정한 목적을 달성하기 위해 수행하는 업무의 묶음을 말한다.
하나의 프로젝트는 정해진 기간, 배정된 금액, 투입인력 등 일정한 제약조건 하에서
각종 요구사항을 수행하는 방식으로 진행된다.
[위키백과](https://ko.wikipedia.org/wiki/%ED%94%84%EB%A1%9C%EC%A0%9D%ED%8A%B8)

- 누구나 프로젝트를 만들 수 있고 조회하고 참여를 신청할 수 있다.
- 개설자는 참여자를 초대할 수 있다.
- 참여 신청자들은 대화를 통해 참여율, 금액을 결정하고 개설자가 내용을 추가한다.
- 개설자는 참여 방식을 참여자들에게 전달하고 참여자가 서명하면 확정된다.
- 계약이 있고 참여가 확정된 경우 참여 계정만 접근할 수 있다.

## base_fields

- 이름 name (human_readable)
- 코드 code (machine_readable:gh,path_alias)
- 설명 description
- 시작일 start_date
- 마감일 due_date
- 상태 state [open|closed]

## fields

- 계약서 contract -> (ref:file_managed.fid)
- 고객 client
- 예산 budget
- 투입[N] input (user_id: {type:full|part,start_date,due_date,rate,price,comment,signed:?})
- 결과[N] output (stage: url, prod: url, docs: [산출물?])
- 레이블 labels -> (ref:taxonomy_term_data.tid:project_labels)

## 목록 표시 정보?

연도
프로젝트명
형태
주소
