<?php

  namespace ThemeClasses\PostType;

  class Core
  {
    public function __construct()
    {
      new Concert();
      new Artist();
    }
  }