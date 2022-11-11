import { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import { Breadcrumbs } from "@mui/material";
import RequestError from "../RequestError";
import axios from "axios";

function FilmDetails() {
	let { filmId } = useParams();
	const [filmData, setFilmData] = useState("");
	const [dataLoaded, setDataLoaded] = useState(false);

	useEffect(() => {
		//const url = `https://api.themoviedb.org/3/movie/${filmId}?api_key=30036f330813b6c38ac0afac066a9cf4&language=fr-FR`;
		const url = process.env.API + `movie/${filmId}`;

		const fetchData = async () => {
			try {
				axios
					.get(url)
					.then(function (response) {
						console.log(response.data);
						setFilmData(response.data);
						setDataLoaded(true);
					})
					.catch(function (error) {
						// handle error
						console.log(error);
					})
					.then(function () {});
			} catch (error) {
				console.log("error", error);
			}
		};

		fetchData();
	}, []);

	const filmInformations = () => {
		if (dataLoaded) {
			return (
				<article id="film">
					<div className="film_img">
						<img
							src={`https://image.tmdb.org/t/p/w200${filmData.poster_path}`}
						></img>
						<h2>{filmData.title}</h2>
						<p className="subtitle">{filmData.tagline}</p>
						<p className="subtitle">{filmData.release_date}</p>
					</div>
					<div className="film_overview">
						<p>{filmData.overview}</p>
					</div>
				</article>
			);
		} else {
			return (
				<RequestError message={filmData.status_message}></RequestError>
			);
		}
	};

	return (
		<section id="film_detail">
			<Breadcrumbs
				className="breadcrumb"
				aria-label="breadcrumb"
			>
				<Link to="/">Accueil</Link>
				<p>{filmData.title}</p>
			</Breadcrumbs>
			{filmInformations()}
		</section>
	);
}

export default FilmDetails;
