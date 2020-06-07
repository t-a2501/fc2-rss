<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
    <title>FC2BLOGの新着情報RSS</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

  <body>
    <form method="get" action="search/SearchFc2Blogs.php">
      <span>日付</span>
        <input type="date" name="entryDate" value="{$result.form.entryDate}" />
      <span>Url</span>
        <input type="text" name="url" value="{$result.form.url}" />
      <span>ユーザー名</span>
        <input type="text" name="userName" value="{$result.form.userName}"/>
      <span>サーバー番号</span>
        <input type="number" name="serverNo" value="{$result.form.serverNo}" />
      <span>エントリーNo</span>
        <input type="number" name="entryNo" value="{$result.form.entryNo}" />以上
        <input type="submit" value="検索" />
    </form>
    {$result.pager}
    {if isset($result.data)}
    <table>      
        <tr>
          <th>日付</th>
          <th>ユーザー名</th>
          <th>タイトル</th>
          <th>Descrption</th>
          <th>URL</th>
        </tr>
      {foreach from=$result.data key=i item=v}
      <tr>
        <td>{$v.entryDate}</td>
        <td>{$v.userName}</td>
        <td>{$v.title}</td>
        <td>{$v.description}</td>
        <td>{$v.url}</td>
      </tr>
      {/foreach}
    </table>
    {/if}
  </body>
</html>
