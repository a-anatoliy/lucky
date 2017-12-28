<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адаптивно-фиксированный макет веб-страницы</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <div class="container">
        <h4>Содержимое header</h4>
        <div>lucky dress</div>
        <div>
            Включение адаптивных возможностей<br> Включите в вашем проекте адаптивный CSS, добавляя соответствующие мета теги и дополнительные таблицы стилей в <i>head</i> вашего документа. Если у вас компилированный Bootstrap, загруженный с нашей страницы, то вам всего лишь нужно добавить мета тег.
        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <article class="col-sm-12 col-md-8 col-lg-9">
            <h4>Содержимое article</h4>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla ...</div>
          </article>
          <aside class="col-sm-12 col-md-4 col-lg-3">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <h4>Содержимое aside 1</h4>
                <p>Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, "Lorem ipsum dolor sit amet..", происходит от одной из строк в разделе 1.10.32. Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 "de Finibus ...</p>
              </div>
              <div class="col-sm-6 col-md-12">
                <h4>Содержимое aside 2</h4>
                <p>Pierwszy wiersz Lorem Ipsum, „Lorem ipsum dolor sit amet...” pochodzi właśnie z sekcji 1.10.32. Standardowy blok Lorem Ipsum, używany od XV wieku, jest odtworzony niżej dla zainteresowanych. Fragmenty 1.10.32 i 1.10.33 z „de Finibus Bonorum et Malorum” Cycerona, są odtworzone w dokładnej, oryginalnej formie, ...</p>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </main>
    <footer>
      <div class="container">
        <p>Copyright &copy; Yukai 2017</p>
      </div>
    </footer>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>