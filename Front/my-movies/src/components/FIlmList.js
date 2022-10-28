import { useState } from "react";
import { Link } from "react-router-dom";
import "./FilmList.css";

function FilmList({ title, datas }) {
  var films = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

  if(datas != null){
    console.log(datas.lenght)
  }

  let filmList = films.map((e) => {
    return <Link id={e} className="film" to={e.toString()}></Link>;
  });

  return (
    <section id="film_list">
      <h4 className="light playlist_title">{title}</h4>
      <div className="scroll_container">
        <div className="film_container">{filmList}</div>
      </div>
    </section>
  );
}

export default FilmList;
