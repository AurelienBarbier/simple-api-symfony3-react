/**
 * Created by lele on 27/12/17.
 */

import * as React from 'react'
import {render} from 'react-dom'
import ArticleStore from "./ArticleStore";
import ArticleList from "./ArticleList";



render(
    <ArticleList/>,
    document.getElementById('root') as Element
)