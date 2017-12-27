import * as React from 'react'
import ArticleStore from './ArticleStore'
import { Article } from './Interfaces'
import ArticleItem from './ArticleItem'

interface ArticleListProps {

}

interface  ArticleListState {
    articles: Article[];
}

export default class ArticleList extends React.Component<ArticleListProps, ArticleListState> {

    private store: ArticleStore = new ArticleStore();

    constructor(props:ArticleListProps){
        super(props);

        this.state = {
            articles: this.store.articles,
        }
    }

    render () {

        return <div className="container">
            <ArticleItem/>
        </div>
    }
}