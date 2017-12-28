import * as React from 'react'
import ArticleStore from './ArticleStore'
import { Article } from './Interfaces'
import ArticleItem from './ArticleItem'


interface ArticleListProps {

}

interface  ArticleListState {
    articles: Article[];
}

export default class ArticleList extends React.PureComponent<ArticleListProps, ArticleListState> {

    private store: ArticleStore = new ArticleStore();

    constructor(props:ArticleListProps){
        super(props);

        this.store.addArticle(5, 'plip', 'testosnjvsjnvdv');
        this.store.addArticle(56, 'plipecs', 'mvor testosnjvsjnvdv');
        this.store.addArticle(32, 'plrrrip', 'testr ros snjvs jnvdv');

        this.state = {
            articles: this.store.articles,
        }
    }

    render () {
        let { articles } = this.state;
        return <div className="container">
            { articles.map( article => {
                return  <ArticleItem article={article } key={ article.id } />
            })}
        </div>
    }
}