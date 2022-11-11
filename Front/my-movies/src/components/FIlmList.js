import { Component, useState } from "react";
import { Link } from "react-router-dom";
import "./FilmList.css";
import RequestError from "./RequestError";

class FilmList extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    const { title, datas, dataLoaded } = this.props;

    if(dataLoaded) {
      var filmList = datas.map(data => {
        return <Link id={data.id} key={data.id} className="film" to={`/film/filmId=` + data.id.toString()} rel={data.title} style={{background: `url(https://image.tmdb.org/t/p/w200${data.poster_path})`}}></Link>;
      });
    }

    return (
      <section id="film_list">
        <h3 className="light playlist_title">{title}</h3>
        <div className="scroll_container">
          <div className="film_container">{filmList ?? <RequestError></RequestError>}</div>
        </div>
      </section>
    );
  }
}

export default FilmList;