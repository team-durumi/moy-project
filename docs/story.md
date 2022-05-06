# 이야기

## 프로젝트 project

프로젝트는 일정한 기간 안에 일정한 목적을 달성하기 위해 수행하는 업무의 묶음을 말한다.
하나의 프로젝트는 정해진 기간, 배정된 금액, 투입인력 등 일정한 제약조건 하에서
각종 요구사항을 수행하는 방식으로 진행된다.
[위키백과](https://ko.wikipedia.org/wiki/%ED%94%84%EB%A1%9C%EC%A0%9D%ED%8A%B8)

- 누구나 프로젝트를 추가할 수 있고 조회하고 참여를 신청할 수 있다.
- 개설자는 참여자를 초대할 수 있다.
- 참여 신청자들은 대화를 통해 참여율, 금액을 결정하고 개설자가 내용을 추가한다.
- 개설자는 참여 방식을 참여자들에게 전달하고 참여자가 서명하면 확정된다.
- 계약이 있고 참여가 확정된 경우[state:launched] 참여 계정만 접근할 수 있다.

### [project] base_fields

- 이름 name (human_readable)
- 코드 code (machine_readable:gh,path_alias)
- 설명 description
- 시작일 start_date
- 마감일 due_date
- 상태 state [open|launched|closed]

### [project] fields

- 계약서 contract -> (ref:file_managed.fid) ? gdoc-url?
- 고객 client
- 예산 budget
- 투입[N] input (user_id: {type:full|part,start_date,due_date,rate,price,comment,signed:?})
- 결과[N] output (stage: url, prod: url, docs: [산출물?])
- 레이블 labels -> (ref:taxonomy_term_data.tid:project_labels)

### [project] 목록 표시 정보?

- name (code) #id
- author
- start_date
- due_date
- state

---

## 이슈 issue

컴퓨팅에서 "문제"라는 용어는 시스템의 개선을 달성하기 위한 작업 단위입니다. 문제는 버그, 요청된 기능, 작업, 누락된 문서 등이 될 수 있습니다.
예를 들어 OpenOffice.org는 수정된 버전의 Bugzilla IssueZilla를 호출했습니다. 2010년 9월 현재, 그들은 시스템을 Issue Tracker라고 부릅니다.

In computing, the term "issue" is a unit of work to accomplish an improvement in a system. An issue could be a bug, a requested feature, task, missing documentation, and so forth.
For example, OpenOffice.org used to call their modified version of Bugzilla IssueZilla. As of September 2010, they call their system Issue Tracker.
[wikipedia](https://en.wikipedia.org/wiki/Software_project_management#Issue)

- 누구나 이슈를 추가할 수 있고 만든 이슈에 대해서 모든 권한을 갖는다.
- 사용자의 역할이나 권한에 따라 접근할 수 있는 이슈가 결정된다.
- 사용자는 이슈에 라벨을 추가할 수 있다.
- 사용자는 이슈에 댓글을 달 수 있다.
- 몇 가지 중요한 이벤트가 발생하면 이슈 조회 화면에 타임라인 아이템을 표시한다.
