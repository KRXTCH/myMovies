import './FilmDetail.css';
import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";

function FilmDetails() {
    let {filmId} = useParams();
    const [filmData, setFilmData] = useState("");

    useEffect(() => {
        const url = `https://api.themoviedb.org/3/movie/${filmId}?api_key=30036f330813b6c38ac0afac066a9cf4&language=fr-FR`;

        const fetchData = async() => {
            try {
                const response = await fetch(url);
                const json = await response.json();
                setFilmData(json);
            } catch (error) {
                console.log("error", error);
            }
        };

        fetchData();
    }, []);

    console.log(filmData)

    return (
        <article id='film_detail'>
            <div className="film_img">
                <img src={`https://image.tmdb.org/t/p/w200${filmData.poster_path}`}></img>
                <h2>{filmData.title}</h2>
                <p>{filmData.tagline}</p>
                <p>{filmData.release_date}</p>
            </div>
            <div className='film_detail'>
                <p>{filmData.overview}</p>
            </div>
        </article>
    )
}

export default FilmDetails;