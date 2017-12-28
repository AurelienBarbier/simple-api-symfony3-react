
import { Article } from './Interfaces'

export default class ArticleStore {

    public articles: Article[] = []


    addArticle (id: number, title: string, content: string): void {
        this.articles = [{
            id: id,
            title: title,
            content: content
        }, ...this.articles];
        //this.inform()
    }
}
