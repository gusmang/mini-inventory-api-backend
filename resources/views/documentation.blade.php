<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="top-bar" content="FFFFFF">
    <meta name="highlight" content="EF5B25">
    <meta name="right-sidebar" content="303030">
    <meta name="logo" content="https://res.cloudinary.com/postman/image/upload/t_team_logo_pubdoc/v1/team/768118b36f06c94b0306958b980558e6915839447e859fe16906e29d683976f0">
    <meta name="run-js" content="https://run.pstmn.io/button.js">
    <meta name="run-css" content="https://run.pstmn.io/button.css">
    <meta name="environmentUID" content="-">
    <meta name="isEnvFetchError" content="false">
    <meta name="collection-info-public" content="true">
    <meta name="collection-isPublicCollection" content="false">
    <meta name="robots" content="noindex,nofollow">
    <meta name="ownerId" content="4172332">
    <meta name="publishedId" content="2s8Z76v8wf">
    <meta name="collectionId" content="4172332-51dce241-247c-48b2-92d9-25705df14d92">
    <meta name="versionTagId" content="latest">
    <link rel="canonical" href="https://documenter.getpostman.com/view/4172332/2s8Z76v8wf">
    <meta name="description" content="The Postman Documenter generates and maintains beautiful, live documentation for your collections. Never worry about maintaining API documentation again.">
    <meta name="documentationLayout" content="classic-double-column">
    <meta name="generator" content="Postman Documenter">
    <title>Mini-Inventory</title>
    <meta name="languages" content="[{&quot;key&quot;:&quot;csharp&quot;,&quot;label&quot;:&quot;C#&quot;,&quot;variant&quot;:&quot;RestSharp&quot;},{&quot;key&quot;:&quot;curl&quot;,&quot;label&quot;:&quot;cURL&quot;,&quot;variant&quot;:&quot;cURL&quot;},{&quot;key&quot;:&quot;dart&quot;,&quot;label&quot;:&quot;Dart&quot;,&quot;variant&quot;:&quot;http&quot;},{&quot;key&quot;:&quot;go&quot;,&quot;label&quot;:&quot;Go&quot;,&quot;variant&quot;:&quot;Native&quot;},{&quot;key&quot;:&quot;http&quot;,&quot;label&quot;:&quot;HTTP&quot;,&quot;variant&quot;:&quot;HTTP&quot;},{&quot;key&quot;:&quot;java&quot;,&quot;label&quot;:&quot;Java&quot;,&quot;variant&quot;:&quot;OkHttp&quot;},{&quot;key&quot;:&quot;java&quot;,&quot;label&quot;:&quot;Java&quot;,&quot;variant&quot;:&quot;Unirest&quot;},{&quot;key&quot;:&quot;javascript&quot;,&quot;label&quot;:&quot;JavaScript&quot;,&quot;variant&quot;:&quot;Fetch&quot;},{&quot;key&quot;:&quot;javascript&quot;,&quot;label&quot;:&quot;JavaScript&quot;,&quot;variant&quot;:&quot;jQuery&quot;},{&quot;key&quot;:&quot;javascript&quot;,&quot;label&quot;:&quot;JavaScript&quot;,&quot;variant&quot;:&quot;XHR&quot;},{&quot;key&quot;:&quot;c&quot;,&quot;label&quot;:&quot;C&quot;,&quot;variant&quot;:&quot;libcurl&quot;},{&quot;key&quot;:&quot;nodejs&quot;,&quot;label&quot;:&quot;NodeJs&quot;,&quot;variant&quot;:&quot;Axios&quot;},{&quot;key&quot;:&quot;nodejs&quot;,&quot;label&quot;:&quot;NodeJs&quot;,&quot;variant&quot;:&quot;Native&quot;},{&quot;key&quot;:&quot;nodejs&quot;,&quot;label&quot;:&quot;NodeJs&quot;,&quot;variant&quot;:&quot;Request&quot;},{&quot;key&quot;:&quot;nodejs&quot;,&quot;label&quot;:&quot;NodeJs&quot;,&quot;variant&quot;:&quot;Unirest&quot;},{&quot;key&quot;:&quot;objective-c&quot;,&quot;label&quot;:&quot;Objective-C&quot;,&quot;variant&quot;:&quot;NSURLSession&quot;},{&quot;key&quot;:&quot;ocaml&quot;,&quot;label&quot;:&quot;OCaml&quot;,&quot;variant&quot;:&quot;Cohttp&quot;},{&quot;key&quot;:&quot;php&quot;,&quot;label&quot;:&quot;PHP&quot;,&quot;variant&quot;:&quot;cURL&quot;},{&quot;key&quot;:&quot;php&quot;,&quot;label&quot;:&quot;PHP&quot;,&quot;variant&quot;:&quot;Guzzle&quot;},{&quot;key&quot;:&quot;php&quot;,&quot;label&quot;:&quot;PHP&quot;,&quot;variant&quot;:&quot;HTTP_Request2&quot;},{&quot;key&quot;:&quot;php&quot;,&quot;label&quot;:&quot;PHP&quot;,&quot;variant&quot;:&quot;pecl_http&quot;},{&quot;key&quot;:&quot;powershell&quot;,&quot;label&quot;:&quot;PowerShell&quot;,&quot;variant&quot;:&quot;RestMethod&quot;},{&quot;key&quot;:&quot;python&quot;,&quot;label&quot;:&quot;Python&quot;,&quot;variant&quot;:&quot;http.client&quot;},{&quot;key&quot;:&quot;python&quot;,&quot;label&quot;:&quot;Python&quot;,&quot;variant&quot;:&quot;Requests&quot;},{&quot;key&quot;:&quot;r&quot;,&quot;label&quot;:&quot;R&quot;,&quot;variant&quot;:&quot;httr&quot;},{&quot;key&quot;:&quot;r&quot;,&quot;label&quot;:&quot;R&quot;,&quot;variant&quot;:&quot;RCurl&quot;},{&quot;key&quot;:&quot;ruby&quot;,&quot;label&quot;:&quot;Ruby&quot;,&quot;variant&quot;:&quot;Net::HTTP&quot;},{&quot;key&quot;:&quot;shell&quot;,&quot;label&quot;:&quot;Shell&quot;,&quot;variant&quot;:&quot;Httpie&quot;},{&quot;key&quot;:&quot;shell&quot;,&quot;label&quot;:&quot;Shell&quot;,&quot;variant&quot;:&quot;wget&quot;},{&quot;key&quot;:&quot;swift&quot;,&quot;label&quot;:&quot;Swift&quot;,&quot;variant&quot;:&quot;URLSession&quot;}]">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700,800" rel="stylesheet">
    <link rel="stylesheet" href="/styles/importer.e7b1af41ec74238493ff.css">
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="https://run.pstmn.io/button.css">
    <script src="/js/messenger-setup.js" nonce="HxaLJDZOBojDJM0DwWczrX7ouYbZsAdRtChhTLMaR1myrmSo"></script>
    <meta property="og:title" content="Mini-Inventory" />
    <meta property="og:description" content="The Postman Documenter generates and maintains beautiful, live documentation for your collections. Never worry about maintaining API documentation again." />
    <meta property="og:site_name" content="Mini-Inventory" />
    <meta property="og:url" content="https://documenter.getpostman.com/view/4172332/2s8Z76v8wf" />
    <meta property="og:image" content="https://res.cloudinary.com/postman/image/upload/t_team_logo_pubdoc/v1/team/768118b36f06c94b0306958b980558e6915839447e859fe16906e29d683976f0" />
    <meta name="twitter:title" value="Mini-Inventory" />
    <meta name="twitter:description" value="The Postman Documenter generates and maintains beautiful, live documentation for your collections. Never worry about maintaining API documentation again." />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:domain" value="https://documenter.getpostman.com/view/4172332/2s8Z76v8wf" />
    <meta name="twitter:image" content="https://res.cloudinary.com/postman/image/upload/t_team_logo_pubdoc/v1/team/768118b36f06c94b0306958b980558e6915839447e859fe16906e29d683976f0" />
    <meta name="twitter:label1" value="Last Update" />
    <meta name="twitter:data1" value="" />
</head>

<body>

</body>

<script>
    window.location = "https://documenter.getpostman.com/view/4172332/2s8Z76v8wf#94990397-cc93-49eb-800e-806258bea2e6";
</script>

</html>